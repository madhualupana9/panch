<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'full_name',
        'sector',
        'projects_count',
        'project_value',
        'description',
        'logo',
        'color',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
