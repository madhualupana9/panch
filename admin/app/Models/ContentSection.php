<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentSection extends Model
{
    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'content',
        'data',
        'image',
        'is_active',
    ];

    protected $casts = [
        'data' => 'array',
        'is_active' => 'boolean',
    ];
}
