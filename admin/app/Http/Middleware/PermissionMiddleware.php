<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$permissions): Response
    {
        $user = auth()->user();

        // Admin users bypass all permission checks
        if ($user && $user->isAdmin()) {
            return $next($request);
        }

        // Check if user has any of the required permissions
        if ($user && $user->hasAnyPermission($permissions)) {
            return $next($request);
        }

        // If no permissions match, deny access
        abort(403, 'You do not have permission to access this resource.');
    }
}
