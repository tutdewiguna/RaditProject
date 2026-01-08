<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedRoles = [1]; // Admin role ID
        
        if (!session()->has('isAdminLoggedIn') || !in_array(session()->get('role_id'), $allowedRoles)) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}

