<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JobApplicationController extends Controller
{
    /**
     * Submit a job application
     */
    public function submit(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'career_id' => 'nullable|exists:careers,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120', // Max 5MB
            'cover_letter' => 'nullable|string|max:2000',
            'linkedin_url' => 'nullable|url|max:255',
            'portfolio_url' => 'nullable|url|max:255',
            'years_of_experience' => 'nullable|integer|min:0|max:50',
            'current_location' => 'nullable|string|max:255',
            'expected_salary' => 'nullable|string|max:100',
            'notice_period' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();
        $email = strtolower(trim($data['email']));
        $ipAddress = $request->ip();

        // Check for spam by IP address
        if (JobApplication::isSpamByIp($ipAddress)) {
            return response()->json([
                'success' => false,
                'message' => 'Too many applications submitted. Please try again later.'
            ], 429);
        }

        // Check for duplicate application
        $isDuplicate = JobApplication::isDuplicate(
            $email,
            $data['career_id'] ?? null,
            30 // Within 30 days
        );

        if ($isDuplicate) {
            return response()->json([
                'success' => false,
                'message' => 'You have already applied for this position recently. We have your application on file.'
            ], 409);
        }

        // Get position title
        $positionApplied = 'General Application';
        if (!empty($data['career_id'])) {
            $career = Career::find($data['career_id']);
            if ($career) {
                $positionApplied = $career->title;
            }
        }

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $originalName = $resume->getClientOriginalName();
            
            // Create a unique filename
            $filename = time() . '_' . str_replace(' ', '_', $originalName);
            
            // Store in storage/app/public/resumes
            $path = $resume->storeAs('resumes', $filename, 'public');
            
            if (!$path) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to upload resume. Please try again.'
                ], 500);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Resume file is required.'
            ], 422);
        }

        // Create the application
        try {
            $application = JobApplication::create([
                'career_id' => $data['career_id'] ?? null,
                'full_name' => $data['full_name'],
                'email' => $email,
                'phone' => $data['phone'],
                'position_applied' => $positionApplied,
                'resume_path' => $path,
                'resume_original_name' => $originalName,
                'cover_letter' => $data['cover_letter'] ?? null,
                'linkedin_url' => $data['linkedin_url'] ?? null,
                'portfolio_url' => $data['portfolio_url'] ?? null,
                'years_of_experience' => $data['years_of_experience'] ?? null,
                'current_location' => $data['current_location'] ?? null,
                'expected_salary' => $data['expected_salary'] ?? null,
                'notice_period' => $data['notice_period'] ?? null,
                'ip_address' => $ipAddress,
                'user_agent' => $request->userAgent(),
                'email_hash' => md5($email),
                'is_duplicate' => false,
                'is_spam' => false,
                'status' => 'pending'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your application has been submitted successfully! We will review it and get back to you soon.',
                'data' => [
                    'application_id' => $application->id,
                    'position' => $positionApplied,
                    'submitted_at' => $application->created_at->format('Y-m-d H:i:s')
                ]
            ], 201);

        } catch (\Exception $e) {
            // If application creation fails, delete the uploaded file
            if (isset($path)) {
                Storage::disk('public')->delete($path);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to submit application. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Check if user can apply (not duplicate/spam)
     */
    public function checkEligibility(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'career_id' => 'nullable|exists:careers,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $email = strtolower(trim($request->email));
        $ipAddress = $request->ip();

        // Check spam by IP
        $isSpamIp = JobApplication::isSpamByIp($ipAddress);
        
        // Check duplicate
        $isDuplicate = JobApplication::isDuplicate(
            $email,
            $request->career_id,
            30
        );

        return response()->json([
            'success' => true,
            'can_apply' => !$isSpamIp && !$isDuplicate,
            'is_spam' => $isSpamIp,
            'is_duplicate' => $isDuplicate,
            'message' => $isSpamIp 
                ? 'Too many applications from your location' 
                : ($isDuplicate 
                    ? 'You have already applied for this position recently' 
                    : 'You can apply for this position')
        ]);
    }
}

