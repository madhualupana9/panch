<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.vendors.index', compact('vendors'));
    }

    public function show(Vendor $vendor)
    {
        if (!$vendor->read_at) {
            $vendor->update(['read_at' => now(), 'status' => 'read']);
        }
        return view('admin.vendors.show', compact('vendor'));
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor deleted successfully!');
    }
}
