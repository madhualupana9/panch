<x-admin-layout 
    title="Role Details" 
    pageTitle="Role Details" 
    pageSubtitle="View and manage role permissions and assigned users">
    
    <div class="max-w-5xl mx-auto py-6">
        <!-- Action Buttons -->
        <div class="mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('admin.roles.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center text-sm font-bold text-gray-600 hover:text-blue-600 transition-all bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-200">
                <i class="fas fa-arrow-left mr-2 text-blue-500"></i>
                Back to Roles
            </a>
            
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <a href="{{ route('admin.roles.edit', $role) }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 hover:text-green-600 hover:border-green-200 transition shadow-sm">
                    <i class="fas fa-edit mr-2 text-green-500"></i>
                    Edit Role
                </a>

                @if($role->name !== 'admin')
                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role? This will affect all users assigned to it.');" class="w-full sm:w-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #dc2626;" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-xl shadow-md text-sm font-bold text-white hover:bg-red-700 transition-all duration-300">
                            <i class="fas fa-trash-alt mr-2"></i> Delete Role
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="space-y-8">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="h-24 w-24 bg-gradient-to-br from-purple-600 to-blue-600 text-white rounded-2xl flex items-center justify-center text-4xl font-bold shadow-lg shadow-purple-100 flex-shrink-0">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="flex-grow">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">{{ $role->display_name }}</h2>
                                <div class="mt-2 flex flex-wrap items-center gap-4 text-sm text-gray-500 font-medium">
                                    <span class="flex items-center">
                                        <i class="fas fa-tag mr-2 text-blue-500"></i>
                                        System Name: {{ $role->name }}
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-users mr-2 text-purple-500"></i>
                                        {{ $role->users->count() }} Users Assigned
                                    </span>
                                </div>
                            </div>
                        </div>
                        @if($role->description)
                            <p class="mt-4 text-gray-600 leading-relaxed">{{ $role->description }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Permissions -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 flex flex-col h-full">
                        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50 rounded-t-2xl">
                            <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider flex items-center">
                                <i class="fas fa-key mr-2 text-yellow-500"></i>
                                Permissions
                            </h3>
                            <span class="text-xs font-bold text-gray-400 uppercase">
                                {{ $role->permissions->count() }} Total
                            </span>
                        </div>
                        <div class="p-6">
                            @if($role->permissions->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($role->permissions as $permission)
                                        <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-xl border border-gray-100">
                                            <div class="w-8 h-8 bg-white rounded-lg shadow-sm flex items-center justify-center text-green-500">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900">{{ $permission->display_name }}</div>
                                                @if($permission->description)
                                                    <div class="text-[11px] text-gray-500">{{ $permission->description }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                                    <i class="fas fa-shield-alt text-5xl mb-4 text-gray-200"></i>
                                    <p class="font-medium">No permissions assigned to this role.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Assigned Users -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 h-full">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 rounded-t-2xl">
                            <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider flex items-center">
                                <i class="fas fa-users mr-2 text-blue-500"></i>
                                Assigned Users
                            </h3>
                        </div>
                        <div class="p-6">
                            @if($role->users->count() > 0)
                                <div class="space-y-4">
                                    @foreach($role->users as $user)
                                        <a href="{{ route('admin.users.show', $user) }}" class="flex items-center space-x-3 p-3 bg-gray-50 rounded-xl border border-gray-100 hover:bg-white hover:border-blue-200 transition-all group">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 text-white rounded-lg flex items-center justify-center font-bold shadow-sm">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div class="overflow-hidden">
                                                <div class="text-sm font-bold text-gray-900 truncate group-hover:text-blue-600">{{ $user->name }}</div>
                                                <div class="text-[11px] text-gray-500 truncate">{{ $user->email }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center py-12 text-gray-400 text-center">
                                    <i class="fas fa-user-slash text-4xl mb-4 text-gray-200"></i>
                                    <p class="text-sm font-medium">No users currently<br>assigned to this role.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
