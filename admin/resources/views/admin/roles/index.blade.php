<x-admin-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Roles Management</h1>
                <p class="text-gray-600 mt-1">Manage user roles and permissions</p>
            </div>
            <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
                <i class="fas fa-plus mr-2"></i>Create Role
            </a>
        </div>

        <!-- Roles Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Role</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Description</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Users</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Permissions</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($roles as $role)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ $role->display_name }}</div>
                                        <div class="text-sm text-gray-500">{{ $role->name }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600">
                                        {{ $role->description ?: 'No description' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $role->users_count ?? $role->users->count() }} users
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $role->permissions->count() }} permissions
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.roles.show', $role) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.roles.edit', $role) }}" class="text-green-600 hover:text-green-800 text-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($role->name !== 'admin')
                                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this role?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    <i class="fas fa-users-cog text-4xl mb-4 text-gray-300"></i>
                                    <p>No roles found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($roles->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $roles->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
