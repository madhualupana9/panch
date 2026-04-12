<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | paanch Admin</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center p-4">
    <!-- Background Effects -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
    </div>

    <!-- 404 Content -->
    <div class="relative max-w-4xl mx-auto text-center">
        <!-- 404 Number -->
        <div class="mb-8 float-animation">
            <h1 class="text-[150px] sm:text-[200px] lg:text-[250px] font-bold leading-none gradient-text">
                404
            </h1>
        </div>

        <!-- Icon -->
        <div class="mb-6">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-500/10 rounded-full border border-blue-500/20">
                <i class="fas fa-exclamation-triangle text-blue-400 text-3xl"></i>
            </div>
        </div>

        <!-- Message -->
        <div class="mb-8">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
                Page Not Found
            </h2>
            <p class="text-lg sm:text-xl text-gray-400 max-w-2xl mx-auto">
                Oops! The page you're looking for doesn't exist in the admin panel.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
            <!-- Go to Dashboard Button -->
            <a href="{{ route('admin.dashboard') }}" 
               class="group relative inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-lg overflow-hidden transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/50 hover:scale-105">
                <i class="fas fa-home"></i>
                <span>Go to Dashboard</span>
            </a>

            <!-- Go Back Button -->
            <button onclick="window.history.back()" 
                    class="group inline-flex items-center gap-2 px-8 py-4 glass-card text-white font-semibold rounded-lg hover:bg-white/10 transition-all duration-300">
                <i class="fas fa-arrow-left"></i>
                <span>Go Back</span>
            </button>
        </div>

        <!-- Helpful Links -->
        <div class="glass-card rounded-2xl p-8">
            <p class="text-gray-400 mb-4">Quick Links:</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                @if(auth()->check() && auth()->user()->hasAnyPermission(['projects.view']))
                <a href="{{ route('admin.projects.index') }}" 
                   class="px-4 py-3 bg-white/5 text-gray-300 rounded-lg border border-white/10 hover:bg-white/10 hover:border-blue-500/50 hover:text-blue-400 transition-all duration-300">
                    <i class="fas fa-project-diagram mb-2"></i>
                    <div class="text-sm">Projects</div>
                </a>
                @endif

                @if(auth()->check() && auth()->user()->hasAnyPermission(['news.view']))
                <a href="{{ route('admin.news.index') }}" 
                   class="px-4 py-3 bg-white/5 text-gray-300 rounded-lg border border-white/10 hover:bg-white/10 hover:border-blue-500/50 hover:text-blue-400 transition-all duration-300">
                    <i class="fas fa-newspaper mb-2"></i>
                    <div class="text-sm">News</div>
                </a>
                @endif

                @if(auth()->check() && auth()->user()->hasAnyPermission(['services.view']))
                <a href="{{ route('admin.services.index') }}" 
                   class="px-4 py-3 bg-white/5 text-gray-300 rounded-lg border border-white/10 hover:bg-white/10 hover:border-blue-500/50 hover:text-blue-400 transition-all duration-300">
                    <i class="fas fa-cogs mb-2"></i>
                    <div class="text-sm">Services</div>
                </a>
                @endif

                @if(auth()->check() && auth()->user()->hasAnyPermission(['clients.view']))
                <a href="{{ route('admin.clients.index') }}" 
                   class="px-4 py-3 bg-white/5 text-gray-300 rounded-lg border border-white/10 hover:bg-white/10 hover:border-blue-500/50 hover:text-blue-400 transition-all duration-300">
                    <i class="fas fa-users mb-2"></i>
                    <div class="text-sm">Clients</div>
                </a>
                @endif

                @if(auth()->check() && auth()->user()->hasAnyPermission(['careers.view']))
                <a href="{{ route('admin.careers.index') }}" 
                   class="px-4 py-3 bg-white/5 text-gray-300 rounded-lg border border-white/10 hover:bg-white/10 hover:border-blue-500/50 hover:text-blue-400 transition-all duration-300">
                    <i class="fas fa-briefcase mb-2"></i>
                    <div class="text-sm">Careers</div>
                </a>
                @endif
            </div>

            @guest
            <div class="mt-6">
                <a href="{{ route('admin.login') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-blue-500/50 transition-all duration-300">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login to Admin Panel</span>
                </a>
            </div>
            @endguest
        </div>

        <!-- Error Code -->
        <div class="mt-8 text-gray-500 text-sm">
            Error Code: 404 | Page Not Found
        </div>
    </div>
</body>
</html>

