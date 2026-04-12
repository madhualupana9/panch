<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied | paanch Admin</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        .shake-animation {
            animation: shake 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center p-4">
    <!-- Background Effects -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl"></div>
    </div>

    <!-- 403 Content -->
    <div class="relative max-w-4xl mx-auto text-center">
        <!-- 403 Number -->
        <div class="mb-8">
            <h1 class="text-[150px] sm:text-[200px] lg:text-[250px] font-bold leading-none gradient-text">
                403
            </h1>
        </div>

        <!-- Icon -->
        <div class="mb-6">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-500/10 rounded-full border border-amber-500/20 shake-animation">
                <i class="fas fa-lock text-amber-400 text-3xl"></i>
            </div>
        </div>

        <!-- Message -->
        <div class="mb-8">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
                Access Denied
            </h2>
            <p class="text-lg sm:text-xl text-gray-400 max-w-2xl mx-auto">
                You don't have permission to access this resource. Please contact your administrator if you believe this is an error.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
            <!-- Go to Dashboard Button -->
            <a href="{{ route('admin.dashboard') }}" 
               class="group relative inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white font-semibold rounded-lg overflow-hidden transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105">
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

        <!-- Permission Info -->
        <div class="glass-card rounded-2xl p-8">
            <div class="flex items-start gap-4 mb-6">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-amber-500/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-info-circle text-amber-400 text-xl"></i>
                    </div>
                </div>
                <div class="text-left">
                    <h3 class="text-lg font-semibold text-white mb-2">Why am I seeing this?</h3>
                    <p class="text-gray-400 text-sm">
                        This page or action requires specific permissions that your account doesn't have. 
                        Your role may not include access to this resource.
                    </p>
                </div>
            </div>

            @auth
            <div class="bg-slate-900/50 rounded-lg p-4 text-left">
                <p class="text-gray-400 text-sm mb-2">Current User:</p>
                <p class="text-white font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-gray-500 text-sm">{{ auth()->user()->email }}</p>
                @if(auth()->user()->role)
                <p class="text-gray-400 text-sm mt-2">Role: <span class="text-blue-400">{{ auth()->user()->role->name }}</span></p>
                @endif
            </div>
            @endauth

            <div class="mt-6">
                <p class="text-gray-500 text-sm">
                    Need access? Contact your system administrator or email 
                    <a href="mailto:infra@paanch.com" class="text-blue-400 hover:text-blue-300">infra@paanch.com</a>
                </p>
            </div>
        </div>

        <!-- Error Code -->
        <div class="mt-8 text-gray-500 text-sm">
            Error Code: 403 | Forbidden
        </div>
    </div>
</body>
</html>

