<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'url',
        'order',
        'is_active',
        'location',
        'parent_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the parent navigation item.
     */
    public function parent()
    {
        return $this->belongsTo(NavigationItem::class, 'parent_id');
    }

    /**
     * Get the child navigation items.
     */
    public function children()
    {
        return $this->hasMany(NavigationItem::class, 'parent_id')->orderBy('order');
    }
}
