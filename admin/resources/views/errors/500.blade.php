<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error | Paanchajanya Admin</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center p-4">
    <!-- Background Effects -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-red-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl"></div>
    </div>

    <!-- 500 Content -->
    <div class="relative max-w-4xl mx-auto text-center">
        <!-- 500 Number -->
        <div class="mb-8">
            <h1 class="text-[150px] sm:text-[200px] lg:text-[250px] font-bold leading-none gradient-text">
                500
            </h1>
        </div>

        <!-- Icon -->
        <div class="mb-6">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-red-500/10 rounded-full border border-red-500/20 pulse-animation">
                <i class="fas fa-server text-red-400 text-3xl"></i>
            </div>
        </div>

        <!-- Message -->
        <div class="mb-8">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
                Server Error
            </h2>
            <p class="text-lg sm:text-xl text-gray-400 max-w-2xl mx-auto">
                Oops! Something went wrong on our server. We're working to fix it.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
            <!-- Refresh Button -->
            <button onclick="window.location.reload()" 
                    class="group relative inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-red-500 to-orange-600 text-white font-semibold rounded-lg overflow-hidden transition-all duration-300 hover:shadow-lg hover:shadow-red-500/50 hover:scale-105">
                <i class="fas fa-sync-alt"></i>
                <span>Refresh Page</span>
            </button>

            <!-- Go to Dashboard Button -->
            <a href="{{ route('admin.dashboard') }}" 
               class="group inline-flex items-center gap-2 px-8 py-4 glass-card text-white font-semibold rounded-lg hover:bg-white/10 transition-all duration-300">
                <i class="fas fa-home"></i>
                <span>Go to Dashboard</span>
            </a>
        </div>

        <!-- Error Details (Only in Development) -->
        @if(config('app.debug') && isset($exception))
        <div class="glass-card rounded-2xl p-8 text-left mb-8">
            <h3 class="text-xl font-bold text-red-400 mb-4 flex items-center gap-2">
                <i class="fas fa-bug"></i>
                Debug Information
            </h3>
            <div class="bg-slate-900/50 rounded-lg p-4 overflow-x-auto">
                <p class="text-red-300 font-mono text-sm mb-2">{{ get_class($exception) }}</p>
                <p class="text-gray-300 font-mono text-sm mb-4">{{ $exception->getMessage() }}</p>
                <p class="text-gray-500 text-xs">{{ $exception->getFile() }}:{{ $exception->getLine() }}</p>
            </div>
        </div>
        @endif

        <!-- Support Info -->
        <div class="glass-card rounded-2xl p-8">
            <p class="text-gray-400 mb-4">If this problem persists, please contact support:</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="mailto:infra@paanch.com" 
                   class="inline-flex items-center gap-2 px-6 py-3 bg-white/5 text-gray-300 rounded-lg border border-white/10 hover:bg-white/10 hover:border-blue-500/50 hover:text-blue-400 transition-all duration-300">
                    <i class="fas fa-envelope"></i>
                    <span>infra@paanch.com</span>
                </a>
            </div>
        </div>

        <!-- Error Code -->
        <div class="mt-8 text-gray-500 text-sm">
            Error Code: 500 | Internal Server Error
        </div>
    </div>
</body>
</html>

