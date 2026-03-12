<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $sections = ContentSection::all();
        return view('admin.content', compact('sections'));
    }

    public function edit($sectionKey)
    {
        $section = ContentSection::where('section_key', $sectionKey)->firstOrFail();
        return view('admin.content-form', compact('section'));
    }

    public function update(Request $request, $sectionKey)
    {
        $section = ContentSection::where('section_key', $sectionKey)->firstOrFail();

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($section->image) {
                Storage::disk('public')->delete($section->image);
            }
            $validated['image'] = $request->file('image')->store('content', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        // Handle JSON data if present
        if ($request->has('data')) {
            $validated['data'] = $request->input('data');
        }

        $section->update($validated);

        return redirect()->route('admin.content.index')
            ->with('success', 'Content section updated successfully!');
    }
}
