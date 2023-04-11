<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $super_adminRole, $adminRole,  $sellerRole): Response
    {
        $roles = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];

        if (in_array($super_adminRole, $roles)) {
            return $next($request);
        } else if (in_array($adminRole, $roles)) {
            return $next($request);
        } else if (in_array($sellerRole, $roles)) {
            return $next($request);
        }

        return Redirect::route('login');
    }
}
