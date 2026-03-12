<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        $contacts = ContactSubmission::orderBy('created_at', 'desc')->paginate(20);
        $newCount = ContactSubmission::where('status', 'new')->count();
        return view('admin.contacts', compact('contacts', 'newCount'));
    }

    public function show(ContactSubmission $contact)
    {
        $contact->markAsRead();
        return view('admin.contacts-show', compact('contact'));
    }

    public function update(Request $request, ContactSubmission $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
            'admin_notes' => 'nullable|string'
        ]);

        $contact->update($validated);
        return redirect()->route('admin.contacts.index')->with('success', 'Contact updated successfully!');
    }

    public function destroy(ContactSubmission $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
