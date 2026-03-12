<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('order')->get();
        return view('admin.careers', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'experience' => 'required|string|max:100',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        if (isset($validated['requirements'])) {
            $validated['requirements'] = array_filter(array_map('trim', explode("\n", $validated['requirements'])));
        }

        if (isset($validated['responsibilities'])) {
            $validated['responsibilities'] = array_filter(array_map('trim', explode("\n", $validated['responsibilities'])));
        }

        Career::create($validated);
        return redirect()->route('admin.careers.index')->with('success', 'Career created successfully!');
    }

    public function edit(Career $career)
    {
        return view('admin.careers-form', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'experience' => 'required|string|max:100',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        if (isset($validated['requirements'])) {
            $validated['requirements'] = array_filter(array_map('trim', explode("\n", $validated['requirements'])));
        }

        if (isset($validated['responsibilities'])) {
            $validated['responsibilities'] = array_filter(array_map('trim', explode("\n", $validated['responsibilities'])));
        }

        $career->update($validated);
        return redirect()->route('admin.careers.index')->with('success', 'Career updated successfully!');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Career deleted successfully!');
    }
}
