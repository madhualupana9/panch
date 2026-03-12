<x-admin-layout title="Careers" pageTitle="Careers Management" pageSubtitle="Manage job openings and career opportunities">
    <div class="bg-white rounded-lg shadow-sm">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">All Job Openings</h2>
                <p class="text-sm text-gray-600 mt-1">Total: {{ $careers->count() }} positions</p>
            </div>
            <a href="{{ route('admin.careers.create') }}" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>Add New Position
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Experience</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($careers as $career)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $career->title }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($career->description, 50) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $career->department }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $career->location }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $career->type === 'Full-time' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $career->type === 'Part-time' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $career->type === 'Contract' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                    {{ $career->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $career->experience }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($career->is_active)
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.careers.edit', $career) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.careers.destroy', $career) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
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
                                <i class="fas fa-briefcase text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">No job openings found</p>
                                <a href="{{ route('admin.careers.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                    Create your first job opening
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>

