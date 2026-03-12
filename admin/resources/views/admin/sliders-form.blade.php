<x-admin-layout 
    :title="isset($slider) ? 'Edit Slider' : 'Create Slider'" 
    :pageTitle="isset($slider) ? 'Edit Slider' : 'Create New Slider'"
    :pageSubtitle="isset($slider) ? 'Update slider details' : 'Add a new slider to your homepage'">

<form action="{{ isset($slider) ? route('admin.sliders.update', $slider) : route('admin.sliders.store') }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="space-y-6">
    @csrf
    @if(isset($slider))
        @method('PUT')
    @endif

    <!-- Main Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
            Slider Content
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Title
                </label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $slider->title ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Main heading on the slider"
                >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Subtitle
                </label>
                <input 
                    type="text" 
                    name="subtitle" 
                    value="{{ old('subtitle', $slider->subtitle ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Smaller text above or below the title"
                >
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Description
                </label>
                <textarea 
                    name="description" 
                    rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Additional text for the slider"
                >{{ old('description', $slider->description ?? '') }}</textarea>
            </div>

            <!-- Link -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Button Link (URL)
                </label>
                <input 
                    type="text" 
                    name="link" 
                    value="{{ old('link', $slider->link ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="e.g., /projects or https://example.com"
                >
            </div>

            <!-- Link Text -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Button Text
                </label>
                <input 
                    type="text" 
                    name="link_text" 
                    value="{{ old('link_text', $slider->link_text ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="e.g., View Projects, Learn More"
                >
            </div>

            <!-- Display Order -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Display Order
                </label>
                <input 
                    type="number" 
                    name="order" 
                    value="{{ old('order', $slider->order ?? 0) }}"
                    min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first.</p>
            </div>

            <!-- Active -->
            <div class="flex items-center">
                <div class="mt-8 flex items-center">
                    <input 
                        type="checkbox" 
                        name="is_active" 
                        id="is_active"
                        value="1"
                        {{ old('is_active', $slider->is_active ?? true) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    >
                    <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">
                        Visible on homepage
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Upload Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-image text-purple-600 mr-2"></i>
            Slider Image
        </h3>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Image File <span class="text-red-500">*</span>
            </label>
            <input
                type="file"
                name="image"
                accept="image/*"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                {{ isset($slider) ? '' : 'required' }}
            >
            <p class="text-sm text-gray-500 mt-1">Max size: 2MB. Recommended: 1920x1080px for full-width sliders.</p>

            @if(isset($slider) && $slider->image)
                <div class="mt-4">
                    <p class="text-sm font-semibold text-gray-700 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider preview" class="w-full max-w-md h-auto object-cover rounded-lg border border-gray-200 shadow-sm">
                </div>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <a href="{{ route('admin.sliders.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
            <i class="fas fa-save mr-2"></i>{{ isset($slider) ? 'Update Slider' : 'Create Slider' }}
        </button>
    </div>
</form>
</x-admin-layout>
