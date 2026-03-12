<x-admin-layout title="Vendors" pageTitle="Vendors" pageSubtitle="Manage vendor form submissions from website">
    <div class="bg-white rounded-lg shadow-sm">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">All Vendor Submissions</h2>
                <p class="text-sm text-gray-600 mt-1">
                    Total: {{ $vendors->total() }} submissions
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($vendors as $vendor)
                        <tr class="hover:bg-gray-50 {{ !$vendor->read_at ? 'bg-blue-50' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $vendor->created_at->format('M d, Y') }}
                                <div class="text-xs text-gray-400">{{ $vendor->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $vendor->name }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <a href="mailto:{{ $vendor->email }}" class="text-blue-600 hover:text-blue-800">{{ $vendor->email }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="tel:{{ $vendor->phone }}" class="text-blue-600 hover:text-blue-800">{{ $vendor->phone }}</a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                {{ $vendor->message }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.vendors.show', $vendor) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <form action="{{ route('admin.vendors.destroy', $vendor) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
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
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-users text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">No vendor submissions found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($vendors->hasPages())
            <div class="p-6 border-t border-gray-200">
                {{ $vendors->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
