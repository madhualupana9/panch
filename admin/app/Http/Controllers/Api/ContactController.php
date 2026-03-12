<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string'
        ]);

        $contact = ContactSubmission::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for contacting us! We will get back to you within 24 hours.',
            'data' => $contact
        ], 201);
    }
}
