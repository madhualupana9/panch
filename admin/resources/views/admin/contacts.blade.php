<x-admin-layout title="Contact Submissions" pageTitle="Contact Submissions" pageSubtitle="Manage contact form submissions from website">
    <div class="bg-white rounded-lg shadow-sm">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">All Contact Submissions</h2>
                <p class="text-sm text-gray-600 mt-1">
                    Total: {{ $contacts->total() }} submissions
                    @if($newCount > 0)
                        <span class="ml-2 px-2 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">{{ $newCount }} new</span>
                    @endif
                </p>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($contacts as $contact)
                        <tr class="hover:bg-gray-50 {{ $contact->status === 'new' ? 'bg-blue-50' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->created_at->format('M d, Y') }}
                                <div class="text-xs text-gray-400">{{ $contact->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                                @if($contact->company)
                                    <div class="text-sm text-gray-500">{{ $contact->company }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:text-blue-800">{{ $contact->email }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($contact->phone)
                                    <a href="tel:{{ $contact->phone }}" class="text-blue-600 hover:text-blue-800">{{ $contact->phone }}</a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->service ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $contact->status === 'new' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $contact->status === 'read' ? 'bg-gray-100 text-gray-800' : '' }}
                                    {{ $contact->status === 'replied' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $contact->status === 'archived' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                    {{ ucfirst($contact->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-envelope text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">No contact submissions found</p>
                                <p class="text-sm text-gray-400 mt-1">Submissions from the contact form will appear here</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($contacts->hasPages())
            <div class="p-6 border-t border-gray-200">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>

