<?php

// Livewire testing script for production debugging
// Run this from the admin directory: php test-livewire.php

require_once 'vendor/autoload.php';

echo "=== Livewire Test Script ===\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n\n";

try {
    // Bootstrap Laravel
    $app = require_once 'bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    
    echo "✅ Laravel bootstrapped successfully\n\n";
    
    // Test Livewire service provider
    echo "🔍 Checking Livewire Service Provider:\n";
    try {
        $livewireManager = app('livewire');
        echo "✅ Livewire service is registered\n";
    } catch (Exception $e) {
        echo "❌ Livewire service not found: " . $e->getMessage() . "\n";
    }
    echo "\n";
    
    // Test Livewire configuration
    echo "🔍 Checking Livewire Configuration:\n";
    try {
        $config = config('livewire');
        echo "✅ Livewire config loaded\n";
        echo "Class namespace: " . ($config['class_namespace'] ?? 'Not set') . "\n";
        echo "View path: " . ($config['view_path'] ?? 'Not set') . "\n";
        echo "Asset injection: " . ($config['inject_assets'] ? 'Enabled' : 'Disabled') . "\n";
    } catch (Exception $e) {
        echo "❌ Livewire config error: " . $e->getMessage() . "\n";
    }
    echo "\n";
    
    // Test Livewire components
    echo "🔍 Testing Livewire Components:\n";
    
    // Test ProjectsTable component
    try {
        $projectsTable = app('App\Livewire\ProjectsTable');
        echo "✅ ProjectsTable component instantiated\n";

        // Test component render (but skip if database is not available)
        try {
            // First check if database is available
            DB::connection()->getPdo();
            echo "✅ Database connection available for component testing\n";

            $view = $projectsTable->render();
            echo "✅ ProjectsTable component renders successfully\n";
            echo "View name: " . $view->getName() . "\n";
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'connection') !== false || strpos($e->getMessage(), 'database') !== false) {
                echo "⚠️  ProjectsTable render skipped - database connection issue: " . $e->getMessage() . "\n";
                echo "   This is expected if database is not configured yet\n";
            } else {
                echo "❌ ProjectsTable render failed: " . $e->getMessage() . "\n";
            }
        }
    } catch (Exception $e) {
        echo "❌ ProjectsTable instantiation failed: " . $e->getMessage() . "\n";
    }
    
    // Test other components
    $components = ['NewsTable', 'ContentEditor', 'NavigationManager'];
    foreach ($components as $component) {
        try {
            $instance = app("App\\Livewire\\{$component}");
            echo "✅ {$component} component instantiated\n";
        } catch (Exception $e) {
            echo "❌ {$component} instantiation failed: " . $e->getMessage() . "\n";
        }
    }
    echo "\n";
    
    // Test Livewire routes
    echo "🔍 Checking Livewire Routes:\n";
    try {
        $routes = Route::getRoutes();
        $livewireRoutes = [];
        
        foreach ($routes as $route) {
            $uri = $route->uri();
            if (strpos($uri, 'livewire') !== false) {
                $livewireRoutes[] = [
                    'uri' => $uri,
                    'methods' => implode('|', $route->methods()),
                    'name' => $route->getName()
                ];
            }
        }
        
        if (empty($livewireRoutes)) {
            echo "❌ No Livewire routes found\n";
        } else {
            echo "✅ Found " . count($livewireRoutes) . " Livewire routes:\n";
            foreach ($livewireRoutes as $route) {
                echo "  - {$route['methods']} {$route['uri']}" . ($route['name'] ? " ({$route['name']})" : "") . "\n";
            }
        }
    } catch (Exception $e) {
        echo "❌ Route check failed: " . $e->getMessage() . "\n";
    }
    echo "\n";
    
    // Test Livewire assets
    echo "🔍 Checking Livewire Assets:\n";
    $assetPaths = [
        'public/livewire/livewire.js',
        'public/livewire/livewire.min.js',
        'public/livewire/manifest.json'
    ];
    
    foreach ($assetPaths as $path) {
        if (file_exists($path)) {
            echo "✅ Asset exists: {$path}\n";
            echo "   Size: " . number_format(filesize($path)) . " bytes\n";
            echo "   Modified: " . date('Y-m-d H:i:s', filemtime($path)) . "\n";
        } else {
            echo "❌ Asset missing: {$path}\n";
        }
    }
    echo "\n";
    
    // Test view files
    echo "🔍 Checking Livewire Views:\n";
    $viewPath = resource_path('views/livewire');
    if (is_dir($viewPath)) {
        echo "✅ Livewire views directory exists: {$viewPath}\n";
        $views = glob($viewPath . '/*.blade.php');
        echo "Found " . count($views) . " view files:\n";
        foreach ($views as $view) {
            $filename = basename($view);
            echo "  - {$filename}\n";
        }
    } else {
        echo "❌ Livewire views directory not found: {$viewPath}\n";
    }
    echo "\n";
    
    // Test database connection for components that need it
    echo "🔍 Testing Database for Livewire Components:\n";
    try {
        DB::connection()->getPdo();
        echo "✅ Database connection successful\n";
        
        // Test if Project model works
        try {
            $projectCount = DB::table('projects')->count();
            echo "✅ Projects table accessible, found {$projectCount} records\n";
        } catch (Exception $e) {
            echo "❌ Projects table error: " . $e->getMessage() . "\n";
        }
    } catch (Exception $e) {
        echo "❌ Database connection failed: " . $e->getMessage() . "\n";
    }
    echo "\n";
    
    echo "=== Test Complete ===\n";
    echo "\n";
    echo "🔧 If Livewire is still not working:\n";
    echo "1. Run: php artisan livewire:publish --assets --force\n";
    echo "2. Clear all caches: php artisan optimize:clear\n";
    echo "3. Check browser console for JavaScript errors\n";
    echo "4. Verify CSRF token is being sent with requests\n";
    echo "5. Check Laravel logs in storage/logs/\n";
    
} catch (Exception $e) {
    echo "❌ Fatal error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
