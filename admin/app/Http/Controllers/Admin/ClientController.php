<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('order')->get();
        return view('admin.clients', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'projects_count' => 'nullable|string|max:50',
            'project_value' => 'nullable|string|max:100',
            'description' => 'required|string',
            'logo' => 'nullable|image|max:2048',
            'color' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('clients', 'public');
        }

        Client::create($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully!');
    }

    public function edit(Client $client)
    {
        return view('admin.clients-form', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'projects_count' => 'nullable|string|max:50',
            'project_value' => 'nullable|string|max:100',
            'description' => 'required|string',
            'logo' => 'nullable|image|max:2048',
            'color' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($client->logo) {
                Storage::disk('public')->delete($client->logo);
            }
            $validated['logo'] = $request->file('logo')->store('clients', 'public');
        }

        $client->update($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully!');
    }

    public function destroy(Client $client)
    {
        if ($client->logo) {
            Storage::disk('public')->delete($client->logo);
        }
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully!');
    }
}
