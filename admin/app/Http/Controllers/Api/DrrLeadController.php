<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DrrEnquiry;
use App\Models\DrrBrochureDownload;
use Illuminate\Http\Request;

class DrrLeadController extends Controller
{
    public function submitEnquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string',
            'source' => 'nullable|string|max:50',
        ]);

        $enquiry = DrrEnquiry::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your enquiry! We will get back to you shortly.',
            'data' => $enquiry,
        ], 201);
    }

    public function submitBrochure(Request $request)
    {
        \Log::info('Brochure submission attempt', $request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string',
        ]);

        $download = DrrBrochureDownload::create($validated);
        $brochureUrl = '/assests/projects/DRR/broucher/PremiumCounty.pdf';

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your brochure download will begin shortly.',
            'data' => $download,
            'brochure_url' => $brochureUrl,
        ], 201);
    }
}
