<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {   
        $user = Auth::guard('admin')->user();
        
        if (!$user || !$user->hasPermissionTo($permission, 'admin')) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
