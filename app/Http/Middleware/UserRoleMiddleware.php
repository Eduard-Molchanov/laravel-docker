<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class  UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->home()->with("message-danger", "Для получения доступа  к  странице - $role - нужно авторизоваться ");
        }
//        dd(Auth::id());
//        dd($DbRole = User::where("id", Auth::id())->first()->roles->role);
        $DbRole = User::where("id", Auth::id())->first()->roles->role;

        if (Auth::check() && $DbRole == $role) {
            return $next($request);
        }


        return redirect()->home()->with("message-danger", "У вас нет доступа к  странице - $role ");
    }
}
