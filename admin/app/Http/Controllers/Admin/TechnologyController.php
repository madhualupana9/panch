<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('category')->orderBy('order')->get();
        return view('admin.technologies', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');

        if (isset($validated['features'])) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $validated['features'])));
        }

        Technology::create($validated);
        return redirect()->route('admin.technologies.index')->with('success', 'Technology created successfully!');
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies-form', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');

        if (isset($validated['features'])) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $validated['features'])));
        }

        $technology->update($validated);
        return redirect()->route('admin.technologies.index')->with('success', 'Technology updated successfully!');
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technology deleted successfully!');
    }
}
