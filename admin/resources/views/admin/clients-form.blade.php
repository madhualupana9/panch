<x-admin-layout 
    title="{{ isset($client) ? 'Edit Client' : 'Create Client' }}" 
    pageTitle="{{ isset($client) ? 'Edit Client' : 'Create New Client' }}" 
    pageSubtitle="{{ isset($client) ? 'Update client information' : 'Add a new client to your portfolio' }}">
    
    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <form action="{{ isset($client) ? route('admin.clients.update', $client) : route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($client))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Short Name *</label>
                        <input type="text" name="name" value="{{ old('name', $client->name ?? '') }}" 
                            placeholder="e.g., HPCL, NTPC"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Full Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $client->full_name ?? '') }}" 
                            placeholder="e.g., Hindustan Petroleum Corporation Limited"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('full_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sector -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sector *</label>
                        <input type="text" name="sector" value="{{ old('sector', $client->sector ?? '') }}" 
                            placeholder="e.g., Oil & Gas, Power, Infrastructure"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('sector')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Projects Count -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Projects Count</label>
                        <input type="text" name="projects_count" value="{{ old('projects_count', $client->projects_count ?? '0') }}" 
                            placeholder="e.g., 15+, 20"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('projects_count')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Project Value -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Project Value</label>
                        <input type="text" name="project_value" value="{{ old('project_value', $client->project_value ?? '') }}" 
                            placeholder="e.g., ₹500+ Cr, $10M+"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('project_value')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Color -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gradient Color Class</label>
                        <select name="color" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Select Color</option>
                            <option value="from-blue-500 to-cyan-500" {{ old('color', $client->color ?? '') === 'from-blue-500 to-cyan-500' ? 'selected' : '' }}>Blue to Cyan</option>
                            <option value="from-purple-500 to-pink-500" {{ old('color', $client->color ?? '') === 'from-purple-500 to-pink-500' ? 'selected' : '' }}>Purple to Pink</option>
                            <option value="from-green-500 to-emerald-500" {{ old('color', $client->color ?? '') === 'from-green-500 to-emerald-500' ? 'selected' : '' }}>Green to Emerald</option>
                            <option value="from-orange-500 to-red-500" {{ old('color', $client->color ?? '') === 'from-orange-500 to-red-500' ? 'selected' : '' }}>Orange to Red</option>
                            <option value="from-indigo-500 to-purple-500" {{ old('color', $client->color ?? '') === 'from-indigo-500 to-purple-500' ? 'selected' : '' }}>Indigo to Purple</option>
                            <option value="from-yellow-500 to-orange-500" {{ old('color', $client->color ?? '') === 'from-yellow-500 to-orange-500' ? 'selected' : '' }}>Yellow to Orange</option>
                        </select>
                        @error('color')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', $client->order ?? 0) }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea name="description" rows="3" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('description', $client->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Logo -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Client Logo</label>
                        <input type="file" name="logo" accept="image/*" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @if(isset($client) && $client->logo)
                            <div class="mt-2">
                                <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}" class="h-24 object-contain">
                            </div>
                        @endif
                        @error('logo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" 
                                {{ old('is_active', $client->is_active ?? true) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm font-medium text-gray-700">Active (visible on website)</span>
                        </label>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.clients.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                        <i class="fas fa-save mr-2"></i>{{ isset($client) ? 'Update Client' : 'Create Client' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

