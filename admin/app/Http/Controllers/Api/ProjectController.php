<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Get all active projects
     */
    public function index(Request $request)
    {
        $query = Project::where('is_active', true);

        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Filter by featured if provided
        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        // Order by value (High to Low), then by order field and created_at
        $projects = $query->orderBy('value', 'desc')
                         ->orderBy('order', 'asc')
                         ->orderBy('created_at', 'desc')
                         ->get();

        // Transform the data for frontend
        $projects = $projects->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'slug' => $project->slug,
                'description' => $project->description,
                'full_description' => $project->full_description,
                'client' => $project->client,
                'location' => $project->location,
                'category' => $project->category,
                'value' => $project->value ? round($project->value / 100, 2) : null, // Convert Lakhs to Crores
                'year' => $project->start_date ? $project->start_date->format('Y') : null,
                'start_date' => $project->start_date ? $project->start_date->format('Y-m-d') : null,
                'end_date' => $project->end_date ? $project->end_date->format('Y-m-d') : null,
                'status' => $project->status,
                'image' => $project->image ? url('storage/' . $project->image) : null,
                'gallery' => $project->gallery ? array_map(function($img) {
                    return url('storage/' . $img);
                }, $project->gallery) : [],
                'is_featured' => $project->is_featured,
                'progress' => $this->calculateProgress($project),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $projects,
            'count' => $projects->count()
        ]);
    }

    /**
     * Get a single project by slug
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)
                         ->where('is_active', true)
                         ->first();

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $project->id,
                'title' => $project->title,
                'slug' => $project->slug,
                'description' => $project->description,
                'full_description' => $project->full_description,
                'client' => $project->client,
                'location' => $project->location,
                'category' => $project->category,
                'value' => $project->value ? round($project->value / 100, 2) : null, // Convert Lakhs to Crores
                'year' => $project->start_date ? $project->start_date->format('Y') : null,
                'start_date' => $project->start_date ? $project->start_date->format('Y-m-d') : null,
                'end_date' => $project->end_date ? $project->end_date->format('Y-m-d') : null,
                'status' => $project->status,
                'image' => $project->image ? url('storage/' . $project->image) : null,
                'gallery' => $project->gallery ? array_map(function($img) {
                    return url('storage/' . $img);
                }, $project->gallery) : [],
                'is_featured' => $project->is_featured,
                'progress' => $this->calculateProgress($project),
            ]
        ]);
    }

    /**
     * Get project statistics
     */
    public function stats()
    {
        $totalProjects = Project::where('is_active', true)->count();
        $completedProjects = Project::where('is_active', true)
                                   ->where('status', 'Completed')
                                   ->count();
        $ongoingProjects = Project::where('is_active', true)
                                 ->where('status', 'In Progress')
                                 ->count();
        $totalValue = Project::where('is_active', true)
                            ->where('status', 'Completed')
                            ->sum('value');

        return response()->json([
            'success' => true,
            'data' => [
                'total_projects' => $totalProjects,
                'completed_projects' => $completedProjects,
                'ongoing_projects' => $ongoingProjects,
                'total_value' => $totalValue ? round($totalValue / 100, 2) : 0, // Convert Lakhs to Crores
            ]
        ]);
    }

    /**
     * Calculate project progress based on dates
     */
    private function calculateProgress($project)
    {
        if ($project->status === 'Completed') {
            return 100;
        }

        if ($project->status !== 'In Progress' || !$project->start_date || !$project->end_date) {
            return null;
        }

        $start = $project->start_date->timestamp;
        $end = $project->end_date->timestamp;
        $now = now()->timestamp;

        if ($now < $start) {
            return 0;
        }

        if ($now > $end) {
            return 100;
        }

        $totalDuration = $end - $start;
        $elapsed = $now - $start;
        $progress = ($elapsed / $totalDuration) * 100;

        return round($progress);
    }
}
