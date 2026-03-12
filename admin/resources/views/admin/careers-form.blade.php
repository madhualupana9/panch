<x-admin-layout 
    title="{{ isset($career) ? 'Edit Career' : 'Create Career' }}" 
    pageTitle="{{ isset($career) ? 'Edit Job Opening' : 'Create New Job Opening' }}" 
    pageSubtitle="{{ isset($career) ? 'Update job opening information' : 'Add a new career opportunity' }}">
    
    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <form action="{{ isset($career) ? route('admin.careers.update', $career) : route('admin.careers.store') }}" method="POST">
                @csrf
                @if(isset($career))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Job Title *</label>
                        <input type="text" name="title" value="{{ old('title', $career->title ?? '') }}" 
                            placeholder="e.g., Senior Civil Engineer"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Department *</label>
                        <input type="text" name="department" value="{{ old('department', $career->department ?? '') }}" 
                            placeholder="e.g., Engineering, Construction"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('department')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                        <input type="text" name="location" value="{{ old('location', $career->location ?? '') }}" 
                            placeholder="e.g., Hyderabad, Multiple Locations"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('location')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Employment Type *</label>
                        <select name="type" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            <option value="">Select Type</option>
                            <option value="Full-time" {{ old('type', $career->type ?? '') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ old('type', $career->type ?? '') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ old('type', $career->type ?? '') === 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Internship" {{ old('type', $career->type ?? '') === 'Internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Experience -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Experience Required *</label>
                        <input type="text" name="experience" value="{{ old('experience', $career->experience ?? '') }}" 
                            placeholder="e.g., 5-8 years, Fresher"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('experience')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', $career->order ?? 0) }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Job Description *</label>
                        <textarea name="description" rows="4" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('description', $career->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Requirements -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Requirements (one per line)</label>
                        <textarea name="requirements" rows="6" 
                            placeholder="Enter each requirement on a new line"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('requirements', isset($career) && $career->requirements ? implode("\n", $career->requirements) : '') }}</textarea>
                        @error('requirements')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Responsibilities -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Responsibilities (one per line)</label>
                        <textarea name="responsibilities" rows="6" 
                            placeholder="Enter each responsibility on a new line"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('responsibilities', isset($career) && $career->responsibilities ? implode("\n", $career->responsibilities) : '') }}</textarea>
                        @error('responsibilities')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" 
                                {{ old('is_active', $career->is_active ?? true) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm font-medium text-gray-700">Active (visible on website)</span>
                        </label>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.careers.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                        <i class="fas fa-save mr-2"></i>{{ isset($career) ? 'Update Job Opening' : 'Create Job Opening' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

