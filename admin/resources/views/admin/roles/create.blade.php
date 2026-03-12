<x-admin-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Create Role</h1>
                <p class="text-gray-600 mt-1">Create a new user role with specific permissions</p>
            </div>
            <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                <i class="fas fa-arrow-left mr-2"></i>Back to Roles
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                    Basic Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Role Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                            placeholder="e.g., editor, manager"
                            required
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Display Name</label>
                        <input 
                            type="text" 
                            name="display_name" 
                            value="{{ old('display_name') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('display_name') border-red-500 @enderror"
                            placeholder="e.g., Content Editor, Project Manager"
                            required
                        >
                        @error('display_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea 
                        name="description" 
                        rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                        placeholder="Describe the role and its responsibilities..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Permissions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                    Permissions
                </h3>

                @if($permissions->count() > 0)
                    <div class="space-y-6">
                        @foreach($permissions as $module => $modulePermissions)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-gray-800 capitalize">
                                        {{ $module ?: 'General' }} Permissions
                                    </h4>
                                    <div class="flex items-center space-x-2">
                                        <button type="button" class="text-sm text-blue-600 hover:text-blue-800 select-all-btn" data-module="{{ $module }}">
                                            Select All
                                        </button>
                                        <button type="button" class="text-sm text-red-600 hover:text-red-800 deselect-all-btn" data-module="{{ $module }}">
                                            Deselect All
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                    @foreach($modulePermissions as $permission)
                                        <label class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                                            <input 
                                                type="checkbox" 
                                                name="permissions[]" 
                                                value="{{ $permission->id }}"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 permission-checkbox"
                                                data-module="{{ $module }}"
                                                {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}
                                            >
                                            <div>
                                                <div class="font-medium text-gray-800">{{ $permission->display_name }}</div>
                                                @if($permission->description)
                                                    <div class="text-sm text-gray-500">{{ $permission->description }}</div>
                                                @endif
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-shield-alt text-4xl mb-4 text-gray-300"></i>
                        <p>No permissions available</p>
                    </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <a href="{{ route('admin.roles.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
                    <i class="fas fa-save mr-2"></i>Create Role
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        // Select/Deselect all permissions for a module
        document.querySelectorAll('.select-all-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const module = this.dataset.module;
                document.querySelectorAll(`input[data-module="${module}"]`).forEach(checkbox => {
                    checkbox.checked = true;
                });
            });
        });

        document.querySelectorAll('.deselect-all-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const module = this.dataset.module;
                document.querySelectorAll(`input[data-module="${module}"]`).forEach(checkbox => {
                    checkbox.checked = false;
                });
            });
        });
    </script>
    @endpush
</x-admin-layout>
