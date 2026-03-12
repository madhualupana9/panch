<x-admin-layout 
    title="Edit Content" 
    :pageTitle="'Edit: ' . $section->title"
    pageSubtitle="Update content section details">

<form action="{{ route('admin.content.update', $section->section_key) }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Section Info -->
    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
        <div class="flex items-center">
            <i class="fas fa-info-circle text-blue-500 mr-3 text-xl"></i>
            <div>
                <p class="text-blue-700 font-semibold">Section Key: <span class="font-mono">{{ $section->section_key }}</span></p>
                <p class="text-blue-600 text-sm">This content section is used on your website pages.</p>
            </div>
        </div>
    </div>

    <!-- Main Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-edit text-blue-600 mr-2"></i>
            Content Details
        </h3>

        <div class="space-y-6">
            <!-- Title -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Section Title</label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $section->title) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle</label>
                <input 
                    type="text" 
                    name="subtitle" 
                    value="{{ old('subtitle', $section->subtitle) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                <textarea 
                    name="content" 
                    rows="8"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >{{ old('content', $section->content) }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Main content for this section</p>
            </div>
        </div>
    </div>

    <!-- Image Upload Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-image text-purple-600 mr-2"></i>
            Section Image
        </h3>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Image</label>
            <input 
                type="file" 
                name="image" 
                accept="image/*"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
            <p class="text-sm text-gray-500 mt-1">Max size: 2MB</p>
            
            @if($section->image)
                <div class="mt-4">
                    <p class="text-sm font-semibold text-gray-700 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}" class="w-64 h-40 object-cover rounded-lg border border-gray-200">
                </div>
            @endif
        </div>
    </div>

    <!-- Settings Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-cog text-gray-600 mr-2"></i>
            Section Settings
        </h3>

        <div class="flex items-center">
            <input 
                type="checkbox" 
                name="is_active" 
                id="is_active"
                value="1"
                {{ old('is_active', $section->is_active) ? 'checked' : '' }}
                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
            >
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">
                <i class="fas fa-toggle-on text-green-500 mr-1"></i>
                Active (Show this section on the website)
            </label>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <a href="{{ route('admin.content.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Content
        </a>
        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
            <i class="fas fa-save mr-2"></i>Update Content
        </button>
    </div>
</form>

</x-admin-layout>

