<x-admin-layout 
    :title="isset($navigation) ? 'Edit Menu Item' : 'Create Menu Item'" 
    :pageTitle="isset($navigation) ? 'Edit Menu Item' : 'Create New Menu Item'"
    :pageSubtitle="isset($navigation) ? 'Update navigation item details' : 'Add a new item to the navigation menu'">

<form action="{{ isset($navigation) ? route('admin.navigation.update', $navigation) : route('admin.navigation.store') }}" 
      method="POST" 
      class="space-y-6">
    @csrf
    @if(isset($navigation))
        @method('PUT')
    @endif

    <!-- Main Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-link text-blue-600 mr-2"></i>
            Menu Item Details
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Menu Name <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $navigation->name ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="e.g., Home, About Us, Services"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- URL -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    URL <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="url" 
                    value="{{ old('url', $navigation->url ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="e.g., /, /about, /services"
                    required
                >
                @error('url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">Use relative URLs (e.g., /about) or full URLs (e.g., https://example.com)</p>
            </div>

            <!-- Parent Item -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Parent Menu Item</label>
                <select 
                    name="parent_id" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                    <option value="">None (Top Level)</option>
                    @foreach($parentItems as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $navigation->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">Select a parent to create a dropdown menu item</p>
            </div>

            <!-- Order -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Display Order</label>
                <input 
                    type="number" 
                    name="order" 
                    value="{{ old('order', $navigation->order ?? 0) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    min="0"
                >
                <p class="text-sm text-gray-500 mt-1">Lower numbers appear first</p>
            </div>
        </div>
    </div>

    <!-- Settings Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-cog text-gray-600 mr-2"></i>
            Settings
        </h3>

        <div class="flex items-center">
            <input 
                type="checkbox" 
                name="is_active" 
                id="is_active"
                value="1"
                {{ old('is_active', $navigation->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
            >
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">
                <i class="fas fa-toggle-on text-green-500 mr-1"></i>
                Active (Show in navigation menu)
            </label>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <a href="{{ route('admin.navigation.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
            <i class="fas fa-save mr-2"></i>{{ isset($navigation) ? 'Update Menu Item' : 'Create Menu Item' }}
        </button>
    </div>
</form>

</x-admin-layout>

