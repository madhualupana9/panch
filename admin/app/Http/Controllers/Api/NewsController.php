<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Get all published news articles
     */
    public function index(Request $request)
    {
        $query = News::where('is_published', true);

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Filter by featured if provided
        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        // Order by published date
        $news = $query->orderBy('published_at', 'desc')
                     ->orderBy('created_at', 'desc')
                     ->get();

        $news = $news->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'slug' => $article->slug,
                'excerpt' => $article->excerpt,
                'content' => $article->content,
                'category' => $article->category,
                'author' => $article->author,
                'image' => $article->image ? url('storage/' . $article->image) : null,
                'gallery' => $article->gallery ? array_map(function($img) {
                    return url('storage/' . $img);
                }, $article->gallery) : [],
                'is_featured' => $article->is_featured,
                'published_at' => $article->published_at ? $article->published_at->format('Y-m-d') : null,
                'views' => $article->views,
                'tags' => $article->tags,
                'read_time' => $this->calculateReadTime($article->content),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $news,
            'count' => $news->count()
        ]);
    }

    /**
     * Get a single news article by slug
     */
    public function show($slug)
    {
        $article = News::where('slug', $slug)
                     ->where('is_published', true)
                     ->first();

        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'News article not found'
            ], 404);
        }

        // Increment views
        $article->increment('views');

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $article->id,
                'title' => $article->title,
                'slug' => $article->slug,
                'excerpt' => $article->excerpt,
                'content' => $article->content,
                'category' => $article->category,
                'author' => $article->author,
                'image' => $article->image ? url('storage/' . $article->image) : null,
                'gallery' => $article->gallery ? array_map(function($img) {
                    return url('storage/' . $img);
                }, $article->gallery) : [],
                'is_featured' => $article->is_featured,
                'published_at' => $article->published_at ? $article->published_at->format('Y-m-d') : null,
                'views' => $article->views,
                'tags' => $article->tags,
                'read_time' => $this->calculateReadTime($article->content),
            ]
        ]);
    }

    /**
     * Calculate estimated read time based on content
     */
    private function calculateReadTime($content)
    {
        $wordCount = str_word_count(strip_tags($content));
        $minutes = ceil($wordCount / 200); // Average reading speed: 200 words per minute
        return $minutes . ' min read';
    }
}

