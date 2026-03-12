<x-admin-layout title="Homepage Sliders" pageTitle="Homepage Sliders Management" pageSubtitle="Manage your homepage slider images and content">
    <div class="bg-white rounded-lg shadow-sm">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">All Sliders</h2>
                <p class="text-sm text-gray-600 mt-1">Total: {{ $sliders->total() }} sliders</p>
            </div>
            <a href="{{ route('admin.sliders.create') }}" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>Add New Slider
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($sliders as $slider)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($slider->image)
                                    <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" class="h-20 w-32 object-cover rounded shadow-sm">
                                @else
                                    <div class="h-20 w-32 bg-gray-200 rounded flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $slider->title ?? 'No Title' }}</div>
                                <div class="text-xs text-gray-500 truncate w-48">{{ $slider->subtitle }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $slider->order }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($slider->is_active)
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
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
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-images text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">No sliders found</p>
                                <a href="{{ route('admin.sliders.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                    Create your first slider
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($sliders->hasPages())
            <div class="p-6 border-t border-gray-200">
                {{ $sliders->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
