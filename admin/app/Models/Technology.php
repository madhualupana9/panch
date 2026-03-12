<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Technology extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'features',
        'icon',
        'order',
        'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($technology) {
            if (empty($technology->slug)) {
                $technology->slug = Str::slug($technology->title);
            }
        });
    }
}
