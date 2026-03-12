<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavigationItem;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $navigationItems = NavigationItem::whereNull('parent_id')
            ->with('children')
            ->orderBy('order')
            ->get();

        return view('admin.navigation', compact('navigationItems'));
    }

    public function create()
    {
        $parentItems = NavigationItem::whereNull('parent_id')->orderBy('order')->get();
        return view('admin.navigation-form', compact('parentItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:navigation_items,id',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? NavigationItem::max('order') + 1;

        NavigationItem::create($validated);

        return redirect()->route('admin.navigation.index')
            ->with('success', 'Navigation item created successfully!');
    }

    public function edit(NavigationItem $navigation)
    {
        $parentItems = NavigationItem::whereNull('parent_id')
            ->where('id', '!=', $navigation->id)
            ->orderBy('order')
            ->get();

        return view('admin.navigation-form', compact('navigation', 'parentItems'));
    }

    public function update(Request $request, NavigationItem $navigation)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:navigation_items,id',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $navigation->update($validated);

        return redirect()->route('admin.navigation.index')
            ->with('success', 'Navigation item updated successfully!');
    }

    public function destroy(NavigationItem $navigation)
    {
        // Delete children first
        $navigation->children()->delete();
        $navigation->delete();

        return redirect()->route('admin.navigation.index')
            ->with('success', 'Navigation item deleted successfully!');
    }
}
