<x-admin-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Edit User: {{ $user->name }}</h1>
                <p class="text-gray-600 mt-1">Update user information and permissions</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                <i class="fas fa-arrow-left mr-2"></i>Back to Users
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- User Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-user text-blue-600 mr-2"></i>
                    User Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{ old('name', $user->name) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                            placeholder="Enter full name"
                            required
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email', $user->email) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                            placeholder="Enter email address"
                            required
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">New Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                            placeholder="Leave blank to keep current password"
                        >
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Leave blank to keep current password</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm New Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Confirm new password"
                        >
                    </div>
                </div>
            </div>

            <!-- Role and Status -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                    Role and Status
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                        <select 
                            name="role_id" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('role_id') border-red-500 @enderror"
                            required
                        >
                            <option value="">Select a role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                    {{ $role->display_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <div class="flex items-center space-x-4 mt-3">
                            <label class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    name="is_active" 
                                    value="1"
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    {{ old('is_active', $user->is_active) ? 'checked' : '' }}
                                >
                                <span class="ml-2 text-sm text-gray-700">Active User</span>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Inactive users cannot log in to the system</p>
                    </div>
                </div>
            </div>

            <!-- User Statistics -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-chart-line text-purple-600 mr-2"></i>
                    User Statistics
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-gray-800">{{ $user->created_at->format('M j, Y') }}</div>
                        <div class="text-sm text-gray-600">Account Created</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-gray-800">
                            @if($user->last_login_at)
                                {{ $user->last_login_at->format('M j, Y') }}
                            @else
                                Never
                            @endif
                        </div>
                        <div class="text-sm text-gray-600">Last Login</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold {{ $user->is_active ? 'text-green-600' : 'text-red-600' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </div>
                        <div class="text-sm text-gray-600">Current Status</div>
                    </div>
                </div>
            </div>

            <!-- Current Permissions -->
            @if($user->role && $user->role->permissions->count() > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-key text-yellow-600 mr-2"></i>
                    Current Permissions (via {{ $user->role->display_name }} role)
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($user->role->permissions as $permission)
                        <div class="flex items-center space-x-2 p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <div>
                                <div class="font-medium text-gray-800">{{ $permission->display_name }}</div>
                                @if($permission->description)
                                    <div class="text-sm text-gray-500">{{ $permission->description }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
                    <i class="fas fa-save mr-2"></i>Update User
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
