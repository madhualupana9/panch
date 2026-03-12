<?php

// Simple route testing script for production debugging
// Run this from the admin directory: php test-routes.php

require_once 'vendor/autoload.php';

echo "=== Laravel Route Test ===\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n\n";

try {
    // Bootstrap Laravel
    $app = require_once 'bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    
    echo "✅ Laravel bootstrapped successfully\n\n";
    
    // Test environment
    echo "🔍 Environment Information:\n";
    echo "APP_ENV: " . config('app.env') . "\n";
    echo "APP_URL: " . config('app.url') . "\n";
    echo "APP_DEBUG: " . (config('app.debug') ? 'true' : 'false') . "\n\n";
    
    // Test database connection
    echo "🔍 Database Connection:\n";
    try {
        DB::connection()->getPdo();
        echo "✅ Database connected: " . DB::connection()->getDatabaseName() . "\n";
    } catch (Exception $e) {
        echo "❌ Database connection failed: " . $e->getMessage() . "\n";
    }
    echo "\n";
    
    // Test route resolution
    echo "🔍 Route Resolution:\n";
    try {
        $adminProjectsRoute = route('admin.projects.index');
        echo "✅ admin.projects.index resolves to: " . $adminProjectsRoute . "\n";
    } catch (Exception $e) {
        echo "❌ admin.projects.index failed: " . $e->getMessage() . "\n";
    }
    
    try {
        $adminDashboardRoute = route('admin.dashboard');
        echo "✅ admin.dashboard resolves to: " . $adminDashboardRoute . "\n";
    } catch (Exception $e) {
        echo "❌ admin.dashboard failed: " . $e->getMessage() . "\n";
    }
    
    try {
        $adminLoginRoute = route('admin.login');
        echo "✅ admin.login resolves to: " . $adminLoginRoute . "\n";
    } catch (Exception $e) {
        echo "❌ admin.login failed: " . $e->getMessage() . "\n";
    }
    echo "\n";
    
    // List admin routes
    echo "🔍 Admin Routes:\n";
    $routes = Route::getRoutes();
    $adminRoutes = [];
    
    foreach ($routes as $route) {
        $name = $route->getName();
        if ($name && strpos($name, 'admin.') === 0) {
            $adminRoutes[] = [
                'name' => $name,
                'uri' => $route->uri(),
                'methods' => implode('|', $route->methods())
            ];
        }
    }
    
    if (empty($adminRoutes)) {
        echo "❌ No admin routes found\n";
    } else {
        echo "Found " . count($adminRoutes) . " admin routes:\n";
        foreach (array_slice($adminRoutes, 0, 10) as $route) {
            echo "  - {$route['name']}: {$route['methods']} {$route['uri']}\n";
        }
        if (count($adminRoutes) > 10) {
            echo "  ... and " . (count($adminRoutes) - 10) . " more\n";
        }
    }
    echo "\n";
    
    // Check middleware
    echo "🔍 Middleware Check:\n";
    try {
        $projectRoute = null;
        foreach ($routes as $route) {
            if ($route->getName() === 'admin.projects.index') {
                $projectRoute = $route;
                break;
            }
        }
        
        if ($projectRoute) {
            $middleware = $projectRoute->middleware();
            echo "✅ admin.projects.index middleware: " . implode(', ', $middleware) . "\n";
        } else {
            echo "❌ admin.projects.index route not found\n";
        }
    } catch (Exception $e) {
        echo "❌ Middleware check failed: " . $e->getMessage() . "\n";
    }
    echo "\n";
    
    // Check controller
    echo "🔍 Controller Check:\n";
    $controllerPath = app_path('Http/Controllers/Admin/ProjectController.php');
    if (file_exists($controllerPath)) {
        echo "✅ ProjectController exists at: " . $controllerPath . "\n";
        
        // Check if controller is loadable
        try {
            $controller = app('App\Http\Controllers\Admin\ProjectController');
            echo "✅ ProjectController can be instantiated\n";
        } catch (Exception $e) {
            echo "❌ ProjectController instantiation failed: " . $e->getMessage() . "\n";
        }
    } else {
        echo "❌ ProjectController not found at: " . $controllerPath . "\n";
    }
    echo "\n";
    
    echo "=== Test Complete ===\n";
    
} catch (Exception $e) {
    echo "❌ Fatal error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
