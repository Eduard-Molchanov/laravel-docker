<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle (Request $request, Closure $next)
    {

        if (Auth::check() && Gate::allows("guest-page-view")) {
            return $next($request);
        }
        if (Auth::check() && Gate::allows("user-page-view")) {
            return $next($request);
        }
        if (Auth::check() && Gate::allows("agent-page-view")) {
            return $next($request);
        }
        if (Auth::check() && Gate::allows("admin-page-view")) {
            return $next($request);
        }
        if (Auth::check() && Gate::allows("system-page-view")) {
            return $next($request);
        }

        return redirect()->back()->with("message-danger", "У вас нет доступа к  этой странице ");
    }
}
