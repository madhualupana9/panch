<x-admin-layout title="Content" pageTitle="Page Content Management" pageSubtitle="Manage all website content sections">

<div class="space-y-6">
    <!-- Info Banner -->
    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
        <div class="flex items-center">
            <i class="fas fa-info-circle text-blue-500 mr-3 text-xl"></i>
            <div>
                <p class="text-blue-700 font-semibold">Content Sections</p>
                <p class="text-blue-600 text-sm">Edit the content sections that appear on your website pages.</p>
            </div>
        </div>
    </div>

    <!-- Content Sections Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($sections as $section)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition">
                <!-- Section Header -->
                <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-bold text-gray-800">{{ $section->title }}</h3>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $section->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ $section->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-600">{{ $section->subtitle ?? 'No subtitle' }}</p>
                </div>

                <!-- Section Content Preview -->
                <div class="p-6">
                    @if($section->image)
                        <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}" class="w-full h-32 object-cover rounded-lg mb-4">
                    @endif
                    
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-key text-blue-500 w-5 mr-2"></i>
                            <span class="font-mono text-xs bg-gray-100 px-2 py-1 rounded">{{ $section->section_key }}</span>
                        </div>
                        
                        @if($section->content)
                            <div class="flex items-start">
                                <i class="fas fa-align-left text-purple-500 w-5 mr-2 mt-1"></i>
                                <p class="text-gray-600 line-clamp-3">{{ Str::limit($section->content, 100) }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Section Actions -->
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    <a href="{{ route('admin.content.edit', $section->section_key) }}" class="w-full flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Section
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                    <i class="fas fa-file-alt text-6xl text-gray-300 mb-4"></i>
                    <p class="text-lg font-semibold text-gray-800 mb-2">No content sections found</p>
                    <p class="text-gray-500">Content sections will appear here once they are created.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Total Sections</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $sections->count() }}</p>
                </div>
                <i class="fas fa-file-alt text-blue-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Active Sections</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $sections->where('is_active', true)->count() }}</p>
                </div>
                <i class="fas fa-toggle-on text-green-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">With Images</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $sections->whereNotNull('image')->count() }}</p>
                </div>
                <i class="fas fa-image text-purple-500 text-3xl"></i>
            </div>
        </div>
    </div>
</div>

</x-admin-layout>

