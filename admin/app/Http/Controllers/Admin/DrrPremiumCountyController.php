<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DrrEnquiry;
use App\Models\DrrBrochureDownload;
use Illuminate\Http\Request;

class DrrPremiumCountyController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'enquiries');

        $enquiries = DrrEnquiry::orderBy('created_at', 'desc')->paginate(20, ['*'], 'enquiries_page');
        $brochureDownloads = DrrBrochureDownload::orderBy('created_at', 'desc')->paginate(20, ['*'], 'brochure_page');

        $stats = [
            'total_enquiries' => DrrEnquiry::count(),
            'new_enquiries' => DrrEnquiry::where('status', 'new')->count(),
            'total_brochure' => DrrBrochureDownload::count(),
            'new_brochure' => DrrBrochureDownload::where('status', 'new')->count(),
        ];

        return view('admin.drr-premium-county.index', compact('enquiries', 'brochureDownloads', 'stats', 'tab'));
    }

    public function showEnquiry(DrrEnquiry $enquiry)
    {
        $enquiry->markAsRead();
        return view('admin.drr-premium-county.show-enquiry', compact('enquiry'));
    }

    public function updateEnquiry(Request $request, DrrEnquiry $enquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
            'admin_notes' => 'nullable|string',
        ]);

        $enquiry->update($validated);
        return redirect()->route('admin.drr.enquiry.show', $enquiry)->with('success', 'Enquiry updated successfully!');
    }

    public function destroyEnquiry(DrrEnquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->route('admin.drr.index', ['tab' => 'enquiries'])->with('success', 'Enquiry deleted successfully!');
    }

    public function showBrochure(DrrBrochureDownload $brochureDownload)
    {
        $brochureDownload->markAsRead();
        return view('admin.drr-premium-county.show-brochure', compact('brochureDownload'));
    }

    public function updateBrochure(Request $request, DrrBrochureDownload $brochureDownload)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
            'admin_notes' => 'nullable|string',
        ]);

        $brochureDownload->update($validated);
        return redirect()->route('admin.drr.brochure.show', $brochureDownload)->with('success', 'Brochure download record updated successfully!');
    }

    public function destroyBrochure(DrrBrochureDownload $brochureDownload)
    {
        $brochureDownload->delete();
        return redirect()->route('admin.drr.index', ['tab' => 'brochure'])->with('success', 'Brochure download record deleted successfully!');
    }

    public function exportEnquiries()
    {
        $enquiries = DrrEnquiry::orderBy('created_at', 'desc')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="drr-enquiries-' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($enquiries) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Name', 'Email', 'Phone', 'Message', 'Source', 'Status', 'Date']);
            foreach ($enquiries as $enquiry) {
                fputcsv($file, [
                    $enquiry->id,
                    $enquiry->name,
                    $enquiry->email,
                    $enquiry->phone,
                    $enquiry->message,
                    $enquiry->source,
                    $enquiry->status,
                    $enquiry->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportBrochure()
    {
        $downloads = DrrBrochureDownload::orderBy('created_at', 'desc')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="drr-brochure-downloads-' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($downloads) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Name', 'Email', 'Phone', 'Message', 'Status', 'Date']);
            foreach ($downloads as $download) {
                fputcsv($file, [
                    $download->id,
                    $download->name,
                    $download->email,
                    $download->phone,
                    $download->message,
                    $download->status,
                    $download->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
