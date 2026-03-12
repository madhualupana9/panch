<x-admin-layout 
    title="{{ isset($technology) ? 'Edit Technology' : 'Create Technology' }}" 
    pageTitle="{{ isset($technology) ? 'Edit Technology' : 'Create New Technology' }}" 
    pageSubtitle="{{ isset($technology) ? 'Update technology information' : 'Add a new technology standard' }}">
    
    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <form action="{{ isset($technology) ? route('admin.technologies.update', $technology) : route('admin.technologies.store') }}" method="POST">
                @csrf
                @if(isset($technology))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" name="title" value="{{ old('title', $technology->title ?? '') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                        <select name="category" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            <option value="">Select Category</option>
                            <option value="HSE" {{ old('category', $technology->category ?? '') === 'HSE' ? 'selected' : '' }}>HSE (Health, Safety, Environment)</option>
                            <option value="QA/QC" {{ old('category', $technology->category ?? '') === 'QA/QC' ? 'selected' : '' }}>QA/QC (Quality Assurance/Control)</option>
                            <option value="Technology" {{ old('category', $technology->category ?? '') === 'Technology' ? 'selected' : '' }}>Technology</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Icon -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon (Font Awesome)</label>
                        <input type="text" name="icon" value="{{ old('icon', $technology->icon ?? '') }}" 
                            placeholder="e.g., shield-alt, check-circle, microchip"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">Enter Font Awesome icon name (without 'fa-')</p>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', $technology->order ?? 0) }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea name="description" rows="3" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('description', $technology->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Features -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Features/Points (one per line)</label>
                        <textarea name="features" rows="6" 
                            placeholder="Enter each feature on a new line"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('features', isset($technology) && $technology->features ? implode("\n", $technology->features) : '') }}</textarea>
                        @error('features')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" 
                                {{ old('is_active', $technology->is_active ?? true) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm font-medium text-gray-700">Active (visible on website)</span>
                        </label>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.technologies.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                        <i class="fas fa-save mr-2"></i>{{ isset($technology) ? 'Update Technology' : 'Create Technology' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

