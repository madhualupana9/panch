<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::where('is_active', true);

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $services = $query->orderBy('order', 'asc')
                         ->orderBy('created_at', 'desc')
                         ->get();

        $services = $services->map(function ($service) {
            return [
                'id' => $service->id,
                'title' => $service->title,
                'slug' => $service->slug,
                'description' => $service->description,
                'icon' => $service->icon,
                'category' => $service->category,
                'features' => $service->features,
                'image' => $service->image ? url('storage/' . $service->image) : null,
                'is_featured' => $service->is_featured,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $services,
            'count' => $services->count()
        ]);
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)
                         ->where('is_active', true)
                         ->first();

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $service->id,
                'title' => $service->title,
                'slug' => $service->slug,
                'description' => $service->description,
                'icon' => $service->icon,
                'category' => $service->category,
                'features' => $service->features,
                'image' => $service->image ? url('storage/' . $service->image) : null,
                'is_featured' => $service->is_featured,
            ]
        ]);
    }
}

