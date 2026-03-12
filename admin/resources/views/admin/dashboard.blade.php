<x-admin-layout title="Dashboard" pageTitle="Dashboard" pageSubtitle="Here's your business overview">
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold mb-2">
                    <i class="fas fa-hand-wave mr-2"></i>
                    Welcome back, {{ auth()->user()->name }}!
                </h3>
                <p class="text-blue-100">Here's your business overview.</p>
            </div>
            <div class="flex space-x-2">
                <button class="px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition">
                    <i class="fas fa-sync-alt mr-2"></i>Refresh
                </button>
                <button class="px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition">
                    <i class="fas fa-download mr-2"></i>Export
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Projects -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-project-diagram text-cyan-600 text-xl"></i>
                </div>
                <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded">+100% vs last month</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $stats['projects'] ?? 0 }}</h3>
            <p class="text-sm text-gray-500">Total Projects</p>
            <div class="mt-4 text-xs text-gray-400">
                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                In stock
            </div>
        </div>

        <!-- Total News -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-newspaper text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded">Active</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $stats['news'] ?? 0 }}</h3>
            <p class="text-sm text-gray-500">News Articles</p>
            <div class="mt-4 text-xs text-gray-400">
                <i class="fas fa-eye text-blue-500 mr-1"></i>
                {{ $stats['news_views'] ?? 0 }} total views
            </div>
        </div>

        <!-- Content Sections -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-alt text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded">Managed</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $stats['content_sections'] ?? 0 }}</h3>
            <p class="text-sm text-gray-500">Content Sections</p>
            <div class="mt-4 text-xs text-gray-400">
                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                All active
            </div>
        </div>

        <!-- Navigation Items -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-bars text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-semibold text-orange-600 bg-orange-100 px-2 py-1 rounded">Menu Items</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $stats['navigation'] ?? 0 }}</h3>
            <p class="text-sm text-gray-500">Navigation Links</p>
            <div class="mt-4 text-xs text-gray-400">
                <i class="fas fa-link text-orange-500 mr-1"></i>
                Active links
            </div>
        </div>
    </div>

    <!-- Quick Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Featured Projects</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['featured_projects'] ?? 0 }}</p>
                </div>
                <i class="fas fa-star text-yellow-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Published News</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['published_news'] ?? 0 }}</p>
                </div>
                <i class="fas fa-check-circle text-green-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Active Sections</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['active_sections'] ?? 0 }}</p>
                </div>
                <i class="fas fa-toggle-on text-blue-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Site Settings</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['settings'] ?? 0 }}</p>
                </div>
                <i class="fas fa-cog text-gray-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Total Users</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['users'] ?? 0 }}</p>
                </div>
                <i class="fas fa-users text-purple-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Vendors</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['vendors'] ?? 0 }}</p>
                </div>
                <i class="fas fa-users text-blue-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Channel Partners</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['channel_partners'] ?? 0 }}</p>
                </div>
                <i class="fas fa-handshake text-indigo-500 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Projects -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800">
                        <i class="fas fa-project-diagram text-blue-600 mr-2"></i>
                        Recent Projects
                    </h3>
                    <a href="{{ route('admin.projects.index') }}" class="text-sm text-blue-600 hover:text-blue-700">View All →</a>
                </div>
            </div>
            <div class="p-6">
                @if(isset($recentProjects) && count($recentProjects) > 0)
                    <div class="space-y-4">
                        @foreach($recentProjects as $project)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-folder text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $project->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $project->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $project->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">No projects yet. <a href="{{ route('admin.projects.create') }}" class="text-blue-600 hover:underline">Create one</a></p>
                @endif
            </div>
        </div>

        <!-- Recent News -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800">
                        <i class="fas fa-newspaper text-purple-600 mr-2"></i>
                        Recent News
                    </h3>
                    <a href="{{ route('admin.news.index') }}" class="text-sm text-blue-600 hover:text-blue-700">View All →</a>
                </div>
            </div>
            <div class="p-6">
                @if(isset($recentNews) && count($recentNews) > 0)
                    <div class="space-y-4">
                        @foreach($recentNews as $news)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-file-alt text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $news->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $news->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $news->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $news->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">No news articles yet. <a href="{{ route('admin.news.create') }}" class="text-blue-600 hover:underline">Create one</a></p>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">
            <i class="fas fa-bolt text-yellow-500 mr-2"></i>
            Quick Actions
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
            <a href="{{ route('admin.projects.create') }}" class="flex flex-col items-center justify-center p-6 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                <i class="fas fa-plus-circle text-blue-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-blue-700">Add Project</span>
            </a>
            <a href="{{ route('admin.news.create') }}" class="flex flex-col items-center justify-center p-6 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                <i class="fas fa-plus-circle text-purple-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-purple-700">Add News</span>
            </a>
            <a href="{{ route('admin.vendors.index') }}" class="flex flex-col items-center justify-center p-6 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition group">
                <i class="fas fa-users text-indigo-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-indigo-700">Vendors</span>
            </a>
            <a href="{{ route('admin.channel-partners.index') }}" class="flex flex-col items-center justify-center p-6 bg-teal-50 hover:bg-teal-100 rounded-lg transition group">
                <i class="fas fa-handshake text-teal-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-teal-700">Partners</span>
            </a>
            <a href="{{ route('admin.content.index') }}" class="flex flex-col items-center justify-center p-6 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                <i class="fas fa-edit text-green-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-green-700">Edit Content</span>
            </a>
            <a href="{{ route('admin.settings') }}" class="flex flex-col items-center justify-center p-6 bg-gray-50 hover:bg-gray-100 rounded-lg transition group">
                <i class="fas fa-cog text-gray-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-gray-700">Settings</span>
            </a>
        </div>
    </div>
</div>
</x-admin-layout>

