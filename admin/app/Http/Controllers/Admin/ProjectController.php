<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'value' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:planned,in_progress,completed',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Handle gallery uploads
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('projects/gallery', 'public');
            }
            $validated['gallery'] = $galleryPaths;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects-form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'value' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:planned,in_progress,completed',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'remove_gallery' => 'nullable|array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Handle gallery updates
        $currentGallery = $project->gallery ?? [];

        // Remove selected images
        if ($request->has('remove_gallery')) {
            foreach ($request->remove_gallery as $imageToRemove) {
                if (($key = array_search($imageToRemove, $currentGallery)) !== false) {
                    Storage::disk('public')->delete($imageToRemove);
                    unset($currentGallery[$key]);
                }
            }
            $currentGallery = array_values($currentGallery); // Re-index array
        }

        // Add new images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $currentGallery[] = $file->store('projects/gallery', 'public');
            }
        }

        $validated['gallery'] = $currentGallery;
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        // Delete gallery images if exist
        if ($project->gallery) {
            foreach ($project->gallery as $galleryImage) {
                Storage::disk('public')->delete($galleryImage);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}

