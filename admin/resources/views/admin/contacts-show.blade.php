<x-admin-layout 
    title="Contact Submission" 
    pageTitle="Contact Submission Details" 
    pageSubtitle="View and manage contact submission">
    
    <div class="max-w-4xl">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('admin.contacts.index') }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>Back to all submissions
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Header -->
            <div class="flex justify-between items-start mb-6 pb-6 border-b border-gray-200">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $contact->name }}</h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Submitted on {{ $contact->created_at->format('F d, Y \a\t h:i A') }}
                    </p>
                </div>
                <span class="px-3 py-1 text-sm font-semibold rounded-full 
                    {{ $contact->status === 'new' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $contact->status === 'read' ? 'bg-gray-100 text-gray-800' : '' }}
                    {{ $contact->status === 'replied' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $contact->status === 'archived' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                    {{ ucfirst($contact->status) }}
                </span>
            </div>

            <!-- Contact Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                    <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-envelope mr-2"></i>{{ $contact->email }}
                    </a>
                </div>

                @if($contact->phone)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Phone</label>
                        <a href="tel:{{ $contact->phone }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-phone mr-2"></i>{{ $contact->phone }}
                        </a>
                    </div>
                @endif

                @if($contact->company)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Company</label>
                        <p class="text-gray-900">{{ $contact->company }}</p>
                    </div>
                @endif

                @if($contact->service)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Service Interested In</label>
                        <p class="text-gray-900">{{ $contact->service }}</p>
                    </div>
                @endif
            </div>

            <!-- Message -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-500 mb-2">Message</label>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</div>
            </div>

            <!-- Update Status Form -->
            <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" class="border-t border-gray-200 pt-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Update Status</label>
                        <select name="status" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>New</option>
                            <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                            <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>

                    <!-- Admin Notes -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Admin Notes (Internal)</label>
                        <textarea name="admin_notes" rows="3" 
                            placeholder="Add internal notes about this submission..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-between items-center mt-6 pt-6 border-t border-gray-200">
                    <div class="text-sm text-gray-500">
                        @if($contact->read_at)
                            <i class="fas fa-check-circle text-green-500 mr-1"></i>
                            Read on {{ $contact->read_at->format('M d, Y \a\t h:i A') }}
                        @endif
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.contacts.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                            <i class="fas fa-save mr-2"></i>Update Submission
                        </button>
                    </div>
                </div>
            </form>

            <!-- Quick Actions -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Quick Actions</h3>
                <div class="flex space-x-3">
                    <a href="mailto:{{ $contact->email }}?subject=Re: Your inquiry&body=Hi {{ $contact->name }},%0D%0A%0D%0AThank you for contacting us." 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-reply mr-2"></i>Reply via Email
                    </a>
                    @if($contact->phone)
                        <a href="tel:{{ $contact->phone }}" 
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            <i class="fas fa-phone mr-2"></i>Call
                        </a>
                    @endif
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this submission?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

