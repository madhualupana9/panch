<x-admin-layout 
    title="User Details" 
    pageTitle="User Details" 
    pageSubtitle="View and manage user information">
    
    <div class="max-w-5xl mx-auto py-6">
        <!-- Action Buttons -->
        <div class="mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('admin.users.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center text-sm font-bold text-gray-600 hover:text-blue-600 transition-all bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-200">
                <i class="fas fa-arrow-left mr-2 text-blue-500"></i>
                Back to Users
            </a>
            
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <a href="{{ route('admin.users.edit', $user) }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 hover:text-green-600 hover:border-green-200 transition shadow-sm">
                    <i class="fas fa-edit mr-2 text-green-500"></i>
                    Edit User
                </a>

                @if($user->id !== auth()->id())
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="w-full sm:w-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #dc2626;" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-xl shadow-md text-sm font-bold text-white hover:bg-red-700 transition-all duration-300">
                            <i class="fas fa-trash-alt mr-2"></i> Delete User
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="space-y-8">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="h-24 w-24 bg-gradient-to-br from-blue-600 to-purple-600 text-white rounded-2xl flex items-center justify-center text-4xl font-bold shadow-lg shadow-blue-100 flex-shrink-0">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="flex-grow">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h2>
                                <div class="mt-2 flex flex-wrap items-center gap-4 text-sm text-gray-500 font-medium">
                                    <span class="flex items-center">
                                        <i class="far fa-envelope mr-2 text-blue-500"></i>
                                        {{ $user->email }}
                                    </span>
                                    <span class="flex items-center">
                                        <i class="far fa-calendar-alt mr-2 text-purple-500"></i>
                                        Joined {{ $user->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <span @class([
                                    'px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest border flex items-center shadow-sm',
                                    'bg-green-50 text-green-700 border-green-200' => $user->is_active,
                                    'bg-red-50 text-red-700 border-red-200' => !$user->is_active,
                                ])>
                                    <span @class([
                                        'w-2 h-2 rounded-full mr-2',
                                        'bg-green-500' => $user->is_active,
                                        'bg-red-500' => !$user->is_active,
                                    ])></span>
                                    {{ $user->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- User Details -->
                <div class="lg:col-span-1 space-y-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-6 pb-2 border-b border-gray-100 flex items-center">
                            <i class="fas fa-id-card mr-2 text-blue-500"></i>
                            Account Details
                        </h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Role</label>
                                <div class="flex items-center p-3 rounded-xl border border-gray-100 bg-gray-50">
                                    <i class="fas fa-shield-alt mr-3 text-blue-600"></i>
                                    <span class="text-sm font-semibold text-gray-900">{{ $user->role->display_name ?? 'No role' }}</span>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Last Login</label>
                                <div class="flex items-center p-3 rounded-xl border border-gray-100 bg-gray-50">
                                    <i class="far fa-clock mr-3 text-purple-600"></i>
                                    <span class="text-sm font-semibold text-gray-900">
                                        {{ $user->last_login_at ? $user->last_login_at->format('M d, Y h:i A') : 'Never' }}
                                    </span>
                                </div>
                            </div>

                            @if($user->last_login_ip)
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Login IP</label>
                                <div class="flex items-center p-3 rounded-xl border border-gray-100 bg-gray-50">
                                    <i class="fas fa-network-wired mr-3 text-gray-400"></i>
                                    <span class="text-sm font-mono text-gray-600">{{ $user->last_login_ip }}</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Permissions -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 h-full">
                        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50 rounded-t-2xl">
                            <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider flex items-center">
                                <i class="fas fa-key mr-2 text-yellow-500"></i>
                                Role Permissions
                            </h3>
                            <span class="text-xs font-bold text-gray-400 uppercase">
                                {{ $user->role ? $user->role->permissions->count() : 0 }} Permissions
                            </span>
                        </div>
                        <div class="p-6">
                            @if($user->role && $user->role->permissions->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($user->role->permissions as $permission)
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
                                    <p class="font-medium">No permissions assigned to this user's role.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
