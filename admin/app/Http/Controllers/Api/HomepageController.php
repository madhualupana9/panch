<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Get all homepage content sections
     */
    public function index()
    {
        try {
            $sections = ContentSection::where('is_active', true)
                ->whereIn('section_key', ['hero', 'about', 'stats', 'business_sectors'])
                ->get()
                ->keyBy('section_key');

            // Process each section to convert image URLs
            $processedSections = [];
            foreach (['hero', 'about', 'stats', 'business_sectors'] as $key) {
                $section = $sections->get($key);
                if ($section) {
                    $sectionData = $section->toArray();
                    $processedSections[$key] = $this->processImageUrls($sectionData);
                } else {
                    $processedSections[$key] = null;
                }
            }

            return response()->json([
                'success' => true,
                'data' => $processedSections
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch homepage content',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get specific section by key
     */
    public function getSection($sectionKey)
    {
        try {
            $section = ContentSection::where('section_key', $sectionKey)
                ->where('is_active', true)
                ->first();

            if (!$section) {
                return response()->json([
                    'success' => false,
                    'message' => 'Section not found'
                ], 404);
            }

            // Process the section data to convert relative image paths to full URLs
            $sectionData = $section->toArray();
            $sectionData = $this->processImageUrls($sectionData);

            return response()->json([
                'success' => true,
                'data' => $sectionData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch section',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Process image URLs in section data
     */
    private function processImageUrls($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $data[$key] = $this->processImageUrls($value);
                } elseif (is_string($value) && $key === 'image' && $value) {
                    // Convert relative image paths to full URLs
                    if (strpos($value, '/images/') === 0) {
                        // For static images (directors, etc.), use Next.js server URL in development
                        if (app()->environment('local')) {
                            $data[$key] = 'http://localhost:3008' . $value;
                        } else {
                            // In production, use the same domain
                            $data[$key] = url($value);
                        }
                    }
                }
            }
        }
        return $data;
    }
}

