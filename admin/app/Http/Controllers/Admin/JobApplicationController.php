<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\Career;
use App\Mail\JobApplicationStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
    /**
     * Display all job applications
     */
    public function index(Request $request)
    {
        $query = JobApplication::with(['career', 'reviewer'])
            ->orderBy('created_at', 'desc');

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Filter by career
        if ($request->has('career_id') && $request->career_id != 'all') {
            $query->where('career_id', $request->career_id);
        }

        // Filter out spam if requested
        if ($request->has('hide_spam') && $request->hide_spam) {
            $query->where('is_spam', false);
        }

        // Search by name or email
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $applications = $query->paginate(20);
        $careers = Career::orderBy('title')->get();

        // Count by status
        $pendingCount = JobApplication::where('status', 'pending')->count();
        $reviewingCount = JobApplication::where('status', 'reviewing')->count();
        $shortlistedCount = JobApplication::where('status', 'shortlisted')->count();

        return view('admin.job-applications', compact('applications', 'careers', 'pendingCount', 'reviewingCount', 'shortlistedCount'));
    }

    /**
     * Show single application details
     */
    public function show(JobApplication $jobApplication)
    {
        $jobApplication->load(['career', 'reviewer']);

        return view('admin.job-applications-show', compact('jobApplication'));
    }

    /**
     * Send email to applicant
     */
    public function sendEmail(Request $request, JobApplication $jobApplication)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        try {
            Mail::send([], [], function ($message) use ($jobApplication, $validated) {
                $message->to($jobApplication->email, $jobApplication->full_name)
                    ->subject($validated['subject'])
                    ->html($validated['message']);
            });

            return redirect()->back()->with('success', 'Email sent successfully to ' . $jobApplication->full_name);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }

    /**
     * Update application status
     */
    public function updateStatus(Request $request, JobApplication $jobApplication)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewing,shortlisted,rejected,hired',
            'admin_notes' => 'nullable|string'
        ]);

        // Store old status for email
        $oldStatus = $jobApplication->status;
        $newStatus = $validated['status'];

        // Update the application
        $jobApplication->update([
            'status' => $newStatus,
            'admin_notes' => $validated['admin_notes'] ?? $jobApplication->admin_notes,
            'reviewed_at' => now(),
            'reviewed_by' => auth()->id()
        ]);

        // Send email notification to applicant if status changed
        if ($oldStatus !== $newStatus) {
            try {
                Mail::to($jobApplication->email)
                    ->send(new JobApplicationStatusUpdated($jobApplication, $oldStatus, $newStatus));

                return redirect()->back()->with('success', 'Application status updated and email sent to applicant!');
            } catch (\Exception $e) {
                // Log the error but don't fail the status update
                \Log::error('Failed to send status update email: ' . $e->getMessage());
                return redirect()->back()->with('success', 'Application status updated successfully! (Email notification failed)');
            }
        }

        return redirect()->back()->with('success', 'Application status updated successfully!');
    }

    /**
     * Mark as spam
     */
    public function markAsSpam(JobApplication $jobApplication)
    {
        $jobApplication->update([
            'is_spam' => true,
            'status' => 'rejected'
        ]);

        return redirect()->back()->with('success', 'Application marked as spam!');
    }

    /**
     * Download resume
     */
    public function downloadResume(JobApplication $jobApplication)
    {
        if (!$jobApplication->resume_path || !Storage::disk('public')->exists($jobApplication->resume_path)) {
            return redirect()->back()->with('error', 'Resume file not found!');
        }

        return Storage::disk('public')->download(
            $jobApplication->resume_path,
            $jobApplication->resume_original_name
        );
    }

    /**
     * Delete application
     */
    public function destroy(JobApplication $jobApplication)
    {
        // Delete resume file
        if ($jobApplication->resume_path && Storage::disk('public')->exists($jobApplication->resume_path)) {
            Storage::disk('public')->delete($jobApplication->resume_path);
        }

        $jobApplication->delete();

        return redirect()->route('admin.job-applications.index')->with('success', 'Application deleted successfully!');
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $validated = $request->validate([
            'action' => 'required|in:delete,mark_spam,update_status',
            'application_ids' => 'required|array',
            'application_ids.*' => 'exists:job_applications,id',
            'status' => 'required_if:action,update_status|in:pending,reviewing,shortlisted,rejected,hired'
        ]);

        $applications = JobApplication::whereIn('id', $validated['application_ids'])->get();

        switch ($validated['action']) {
            case 'delete':
                foreach ($applications as $application) {
                    if ($application->resume_path && Storage::disk('public')->exists($application->resume_path)) {
                        Storage::disk('public')->delete($application->resume_path);
                    }
                    $application->delete();
                }
                $message = 'Applications deleted successfully!';
                break;

            case 'mark_spam':
                JobApplication::whereIn('id', $validated['application_ids'])
                    ->update(['is_spam' => true, 'status' => 'rejected']);
                $message = 'Applications marked as spam!';
                break;

            case 'update_status':
                $newStatus = $validated['status'];
                $emailsSent = 0;
                $emailsFailed = 0;

                foreach ($applications as $application) {
                    $oldStatus = $application->status;

                    // Update the application
                    $application->update([
                        'status' => $newStatus,
                        'reviewed_at' => now(),
                        'reviewed_by' => auth()->id()
                    ]);

                    // Send email if status changed
                    if ($oldStatus !== $newStatus) {
                        try {
                            Mail::to($application->email)
                                ->send(new JobApplicationStatusUpdated($application, $oldStatus, $newStatus));
                            $emailsSent++;
                        } catch (\Exception $e) {
                            \Log::error('Failed to send bulk status update email: ' . $e->getMessage());
                            $emailsFailed++;
                        }
                    }
                }

                $message = "Applications status updated! Emails sent: {$emailsSent}";
                if ($emailsFailed > 0) {
                    $message .= " (Failed: {$emailsFailed})";
                }
                break;
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Get statistics
     */
    public function statistics()
    {
        $stats = [
            'total' => JobApplication::count(),
            'pending' => JobApplication::where('status', 'pending')->count(),
            'reviewing' => JobApplication::where('status', 'reviewing')->count(),
            'shortlisted' => JobApplication::where('status', 'shortlisted')->count(),
            'rejected' => JobApplication::where('status', 'rejected')->count(),
            'hired' => JobApplication::where('status', 'hired')->count(),
            'spam' => JobApplication::where('is_spam', true)->count(),
            'duplicate' => JobApplication::where('is_duplicate', true)->count(),
            'this_month' => JobApplication::whereMonth('created_at', now()->month)->count(),
            'this_week' => JobApplication::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
        ];

        return response()->json($stats);
    }
}

