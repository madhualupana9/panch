<x-admin-layout 
    title="{{ isset($service) ? 'Edit Service' : 'Create Service' }}" 
    pageTitle="{{ isset($service) ? 'Edit Service' : 'Create New Service' }}" 
    pageSubtitle="{{ isset($service) ? 'Update service information' : 'Add a new service to your website' }}">
    
    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($service))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Icon -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon (Font Awesome)</label>
                        <input type="text" name="icon" value="{{ old('icon', $service->icon ?? '') }}" 
                            placeholder="e.g., building, cog, wrench"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">Enter Font Awesome icon name (without 'fa-')</p>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', $service->order ?? 0) }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea name="description" rows="3" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('description', $service->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Features -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Features (one per line)</label>
                        <textarea name="features" rows="6" 
                            placeholder="Enter each feature on a new line"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('features', isset($service) && $service->features ? implode("\n", $service->features) : '') }}</textarea>
                        @error('features')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Image</label>
                        <input type="file" name="image" accept="image/*" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @if(isset($service) && $service->image)
                            <div class="mt-2">
                                <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="h-32 rounded-lg">
                            </div>
                        @endif
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" 
                                {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm font-medium text-gray-700">Active (visible on website)</span>
                        </label>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.services.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                        <i class="fas fa-save mr-2"></i>{{ isset($service) ? 'Update Service' : 'Create Service' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

