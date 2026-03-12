<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(15);
        return view('admin.news', compact('news'));
    }

    public function create()
    {
        return view('admin.news-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'tags' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Handle gallery uploads
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('news/gallery', 'public');
            }
            $validated['gallery'] = $galleryPaths;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        // Convert tags string to array
        if (isset($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        // Set published_at if publishing
        if ($validated['is_published'] && !isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News article created successfully!');
    }

    public function edit(News $news)
    {
        return view('admin.news-form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'remove_gallery' => 'nullable|array',
            'tags' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Handle gallery updates
        $currentGallery = $news->gallery ?? [];

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
                $currentGallery[] = $file->store('news/gallery', 'public');
            }
        }

        $validated['gallery'] = $currentGallery;
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        // Convert tags string to array
        if (isset($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        // Set published_at if publishing for the first time
        if ($validated['is_published'] && !$news->published_at && !isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News article updated successfully!');
    }

    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        // Delete gallery images if exist
        if ($news->gallery) {
            foreach ($news->gallery as $galleryImage) {
                Storage::disk('public')->delete($galleryImage);
            }
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News article deleted successfully!');
    }
}
