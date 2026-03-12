<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'gallery',
        'category',
        'author',
        'is_featured',
        'is_published',
        'published_at',
        'views',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->slug)) {
                $slug = Str::slug($news->title);
                $count = static::where('slug', 'LIKE', "{$slug}%")->count();
                $news->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        });

        static::updating(function ($news) {
            if ($news->isDirty('title') && empty($news->slug)) {
                $slug = Str::slug($news->title);
                $count = static::where('slug', 'LIKE', "{$slug}%")
                    ->where('id', '!=', $news->id)
                    ->count();
                $news->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        });
    }
}
