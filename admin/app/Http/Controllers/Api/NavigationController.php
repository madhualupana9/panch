<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NavigationItem;

class NavigationController extends Controller
{
    /**
     * Get navigation items for frontend
     */
    public function index()
    {
        $navigationItems = NavigationItem::where('is_active', true)
            ->whereNull('parent_id')
            ->with(['children' => function($query) {
                $query->where('is_active', true)->orderBy('order');
            }])
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $navigationItems
        ]);
    }

    /**
     * Get navigation items by location
     */
    public function byLocation($location = 'header')
    {
        $navigationItems = NavigationItem::where('is_active', true)
            ->where('location', $location)
            ->whereNull('parent_id')
            ->with(['children' => function($query) {
                $query->where('is_active', true)->orderBy('order');
            }])
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $navigationItems,
            'location' => $location
        ]);
    }
}

