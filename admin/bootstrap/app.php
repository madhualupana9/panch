<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'permission' => \App\Http\Middleware\PermissionMiddleware::class,
        ]);

        // Exclude API routes from CSRF verification
        $middleware->validateCsrfTokens(except: [
            'api/*',
        ]);

        // Redirect guests to admin login (use function to avoid redirect loop)
        $middleware->redirectGuestsTo(fn () => route('admin.login'));

        // Redirect authenticated users to admin dashboard
        $middleware->redirectUsersTo(fn () => route('admin.dashboard'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
