<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::where('is_active', true);

        if ($request->has('sector')) {
            $query->where('sector', $request->sector);
        }

        $clients = $query->orderBy('order', 'asc')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $clients = $clients->map(function ($client) {
            return [
                'id' => $client->id,
                'name' => $client->name,
                'slug' => $client->slug,
                'full_name' => $client->full_name,
                'sector' => $client->sector,
                'description' => $client->description,
                'projects_count' => $client->projects_count,
                'project_value' => $client->project_value,
                'logo' => $client->logo ? url('storage/' . $client->logo) : null,
                'color' => $client->color,
                'is_featured' => $client->is_featured,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $clients,
            'count' => $clients->count()
        ]);
    }

    public function show($slug)
    {
        $client = Client::where('slug', $slug)
                       ->where('is_active', true)
                       ->first();

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Client not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $client->id,
                'name' => $client->name,
                'slug' => $client->slug,
                'full_name' => $client->full_name,
                'sector' => $client->sector,
                'description' => $client->description,
                'projects_count' => $client->projects_count,
                'project_value' => $client->project_value,
                'logo' => $client->logo ? url('storage/' . $client->logo) : null,
                'color' => $client->color,
                'is_featured' => $client->is_featured,
            ]
        ]);
    }
}

