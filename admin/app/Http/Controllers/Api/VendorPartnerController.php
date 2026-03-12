<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\ChannelPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorPartnerController extends Controller
{
    public function submitVendor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        Vendor::create($request->all());

        return response()->json(['success' => true, 'message' => 'Thank you for your interest! We will contact you soon.']);
    }

    public function submitChannelPartner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        ChannelPartner::create($request->all());

        return response()->json(['success' => true, 'message' => 'Thank you for your interest! We will contact you soon.']);
    }
}
