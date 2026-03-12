<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Get all active job openings
     */
    public function index(Request $request)
    {
        $query = Career::where('is_active', true);
        
        // Filter by department if provided
        if ($request->has('department')) {
            $query->where('department', $request->department);
        }
        
        // Filter by location if provided
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        
        // Filter by type if provided
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }
        
        $careers = $query->orderBy('order', 'asc')
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return response()->json([
            'success' => true,
            'data' => $careers,
            'count' => $careers->count()
        ]);
    }

    /**
     * Get single job opening by ID
     */
    public function show($id)
    {
        $career = Career::where('id', $id)
                       ->where('is_active', true)
                       ->first();
        
        if (!$career) {
            return response()->json([
                'success' => false,
                'message' => 'Job opening not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $career
        ]);
    }

    /**
     * Get available departments
     */
    public function departments()
    {
        $departments = Career::where('is_active', true)
            ->select('department')
            ->distinct()
            ->pluck('department');
        
        return response()->json([
            'success' => true,
            'data' => $departments
        ]);
    }

    /**
     * Get available locations
     */
    public function locations()
    {
        $locations = Career::where('is_active', true)
            ->select('location')
            ->distinct()
            ->pluck('location');
        
        return response()->json([
            'success' => true,
            'data' => $locations
        ]);
    }
}

