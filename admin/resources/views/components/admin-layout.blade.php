@props(['title' => 'Dashboard', 'pageTitle' => 'Dashboard', 'pageSubtitle' => 'Welcome back!'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Paanchajanya Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .sidebar-link.active {
            background: linear-gradient(90deg, #3b82f6 0%, #8b5cf6 100%);
            color: white;
        }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 overflow-y-auto">
            <!-- Logo -->
            <div class="p-6 border-b border-slate-700">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-building text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold">Paanchajanya Admin</h1>
                        <p class="text-xs text-gray-400">Management Panel</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Content Management -->
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Content</p>
                </div>
                
                <!-- <a href="{{ route('admin.content.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.content.*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt w-5"></i>
                    <span>Page Content</span>
                </a> -->

                @if(auth()->user()->can('projects.view'))
                <a href="{{ route('admin.projects.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="fas fa-project-diagram w-5"></i>
                    <span>Projects</span>
                </a>
                @endif

                @if(auth()->user()->can('news.view'))
                <a href="{{ route('admin.news.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper w-5"></i>
                    <span>News & Blog</span>
                </a>
                @endif

                @if(auth()->user()->can('navigation.view'))
                <a href="{{ route('admin.navigation.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.navigation.*') ? 'active' : '' }}">
                    <i class="fas fa-bars w-5"></i>
                    <span>Navigation</span>
                </a>
                @endif

                @if(auth()->user()->can('services.view'))
                <a href="{{ route('admin.services.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fas fa-cogs w-5"></i>
                    <span>Services</span>
                </a>
                @endif

                @if(auth()->user()->can('technologies.view'))
                <a href="{{ route('admin.technologies.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
                    <i class="fas fa-microchip w-5"></i>
                    <span>Technologies</span>
                </a>
                @endif

                @if(auth()->user()->can('clients.view'))
                <a href="{{ route('admin.clients.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Clients</span>
                </a>
                @endif

                @if(auth()->user()->can('careers.view'))
                <a href="{{ route('admin.careers.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.careers.*') && !request()->routeIs('admin.job-applications.*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase w-5"></i>
                    <span>Careers</span>
                </a>
                @endif

                <!-- Inquiries -->
                @if(auth()->user()->can('job-applications.view') || auth()->user()->can('contacts.view'))
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Inquiries</p>
                </div>

                @if(auth()->user()->can('job-applications.view'))
                <a href="{{ route('admin.job-applications.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.job-applications.*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie w-5"></i>
                    <span>Job Applications</span>
                    @php
                        $pendingApplicationsCount = \App\Models\JobApplication::where('status', 'pending')->count();
                    @endphp
                    @if($pendingApplicationsCount > 0)
                        <span class="ml-auto bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">{{ $pendingApplicationsCount }}</span>
                    @endif
                </a>
                @endif

                @if(auth()->user()->can('contacts.view'))
                <a href="{{ route('admin.contacts.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope w-5"></i>
                    <span>Contact Submissions</span>
                    @php
                        $newContactsCount = \App\Models\ContactSubmission::where('status', 'new')->count();
                    @endphp
                    @if($newContactsCount > 0)
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $newContactsCount }}</span>
                    @endif
                </a>
                @endif
                @endif

                <!-- User Management -->
                @if(auth()->user()->can('users.view') || auth()->user()->can('roles.view'))
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">User Management</p>
                </div>

                @if(auth()->user()->can('users.view'))
                <a href="{{ route('admin.users.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Users</span>
                </a>
                @endif

                @if(auth()->user()->can('roles.view'))
                <a href="{{ route('admin.roles.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                    <i class="fas fa-shield-alt w-5"></i>
                    <span>Roles & Permissions</span>
                </a>
                @endif
                @endif

                <!-- Settings -->
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Settings</p>
                </div>

                @if(auth()->user()->can('settings.view'))
                <a href="{{ route('admin.settings') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog w-5"></i>
                    <span>Site Settings</span>
                </a>
                @endif

                <a href="{{ route('admin.logout') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-600 transition text-red-400">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $pageTitle }}</h2>
                        <p class="text-sm text-gray-500">{{ $pageSubtitle }}</p>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- User Dropdown -->
                        <div class="relative group">
                            <button class="flex items-center space-x-3 px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <div class="text-left">
                                    <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ auth()->user()->role->display_name ?? 'User' }}</p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-600 text-xs"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="{{ route('admin.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <hr class="my-1">
                                <a href="{{ route('admin.logout') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <p class="text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>

