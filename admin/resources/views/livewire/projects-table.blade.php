<div>
    <!-- Search and Filters -->
    <div class="mb-6 flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <!-- Search Input -->
            <div class="relative">
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search projects..."
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-64"
                >
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>

            <!-- Status Filter -->
            <select
                wire:model.live="statusFilter"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 w-full md:w-auto"
            >
                <option value="">All Status</option>
                <option value="planned">Planned</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <a href="{{ route('admin.projects.create') }}" class="btn-primary w-full md:w-auto text-center">
            <i class="fas fa-plus mr-2"></i>Add New Project
        </a>
    </div>

    <!-- Loading Indicator -->
    <div wire:loading class="mb-4">
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
            <div class="flex items-center">
                <i class="fas fa-spinner fa-spin text-blue-500 mr-3"></i>
                <p class="text-blue-700">Loading...</p>
            </div>
        </div>
    </div>

    <!-- Projects Table -->
    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left">
                            <button wire:click="sortBy('title')" class="flex items-center space-x-1 text-xs font-semibold text-gray-600 uppercase tracking-wider hover:text-gray-900">
                                <span>Project</span>
                                @if($sortField === 'title')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                @else
                                    <i class="fas fa-sort text-gray-400"></i>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Client</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-4 text-left">
                            <button wire:click="sortBy('status')" class="flex items-center space-x-1 text-xs font-semibold text-gray-600 uppercase tracking-wider hover:text-gray-900">
                                <span>Status</span>
                                @if($sortField === 'status')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                @else
                                    <i class="fas fa-sort text-gray-400"></i>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Featured</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Active</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($projects as $project)
                        <tr class="hover:bg-gray-50 transition" wire:key="project-{{ $project->id }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    @if($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-12 h-12 rounded-lg object-cover">
                                    @else
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-purple-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-blue-500"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $project->title }}</p>
                                        <p class="text-sm text-gray-500">{{ $project->category }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">{{ $project->client ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $project->location ?? 'N/A' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $project->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $project->status === 'in_progress' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $project->status === 'planned' ? 'bg-yellow-100 text-yellow-700' : '' }}">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button
                                    wire:click="toggleFeatured({{ $project->id }})"
                                    class="transition hover:scale-110"
                                >
                                    @if($project->is_featured)
                                        <i class="fas fa-star text-yellow-500 text-xl"></i>
                                    @else
                                        <i class="far fa-star text-gray-300 text-xl hover:text-yellow-500"></i>
                                    @endif
                                </button>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button
                                    wire:click="toggleActive({{ $project->id }})"
                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition {{ $project->is_active ? 'bg-green-500' : 'bg-gray-300' }}"
                                >
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition {{ $project->is_active ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button
                                        wire:click="deleteProject({{ $project->id }})"
                                        wire:confirm="Are you sure you want to delete this project?"
                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                                    <p class="text-lg font-semibold mb-2">No projects found</p>
                                    @if($search || $statusFilter)
                                        <p class="text-sm text-gray-400 mb-4">Try adjusting your filters</p>
                                    @else
                                        <a href="{{ route('admin.projects.create') }}" class="text-blue-600 hover:underline mt-2">
                                            Create your first project
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>
