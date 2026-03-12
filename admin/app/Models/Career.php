<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title',
        'department',
        'location',
        'type',
        'experience',
        'description',
        'requirements',
        'responsibilities',
        'order',
        'is_active'
    ];

    protected $casts = [
        'requirements' => 'array',
        'responsibilities' => 'array',
        'is_active' => 'boolean'
    ];
}
