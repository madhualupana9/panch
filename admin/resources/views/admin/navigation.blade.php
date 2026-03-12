<x-admin-layout title="Navigation" pageTitle="Navigation Management" pageSubtitle="Manage website menu items">

<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex items-center justify-between">
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg flex-1 mr-4">
            <div class="flex items-center">
                <i class="fas fa-info-circle text-blue-500 mr-3 text-xl"></i>
                <div>
                    <p class="text-blue-700 font-semibold">Navigation Menu</p>
                    <p class="text-blue-600 text-sm">Manage the main navigation menu items for your website.</p>
                </div>
            </div>
        </div>
        <!-- <a href="{{ route('admin.navigation.create') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition whitespace-nowrap">
            <i class="fas fa-plus mr-2"></i>Add Menu Item
        </a> -->
    </div>

    <!-- Navigation Items Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Menu Item</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">URL</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($navigationItems as $item)
                    <!-- Parent Item -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-link text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $item->name }}</p>
                                    @if($item->children->count() > 0)
                                        <p class="text-xs text-gray-500">{{ $item->children->count() }} sub-items</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600 font-mono bg-gray-100 px-2 py-1 rounded">{{ $item->url }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-sm font-semibold bg-gray-100 text-gray-700 rounded-full">{{ $item->order }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $item->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.navigation.edit', $item) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- <form action="{{ route('admin.navigation.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure? This will also delete all sub-items.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form> -->
                            </div>
                        </td>
                    </tr>

                    <!-- Child Items -->
                    @foreach($item->children as $child)
                        <tr class="hover:bg-gray-50 transition bg-gray-50/50">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3 pl-12">
                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-level-down-alt text-purple-600 text-xs"></i>
                                    </div>
                                    <p class="text-sm text-gray-700">{{ $child->name }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600 font-mono bg-gray-100 px-2 py-1 rounded">{{ $child->url }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 text-sm font-semibold bg-gray-100 text-gray-700 rounded-full">{{ $child->order }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $child->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $child->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.navigation.edit', $child) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.navigation.destroy', $child) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this menu item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-bars text-6xl text-gray-300 mb-4"></i>
                                <p class="text-lg font-semibold mb-2">No navigation items found</p>
                                <a href="{{ route('admin.navigation.create') }}" class="text-blue-600 hover:underline mt-2">
                                    Create your first menu item
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Total Items</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $navigationItems->count() }}</p>
                </div>
                <i class="fas fa-bars text-blue-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Active Items</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $navigationItems->where('is_active', true)->count() }}</p>
                </div>
                <i class="fas fa-toggle-on text-green-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Sub Items</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $navigationItems->sum(fn($item) => $item->children->count()) }}</p>
                </div>
                <i class="fas fa-level-down-alt text-purple-500 text-3xl"></i>
            </div>
        </div>
    </div>
</div>

</x-admin-layout>

