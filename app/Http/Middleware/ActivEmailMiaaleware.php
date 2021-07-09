<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivEmailMiaaleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->home()->with("message-danger", "Для получения доступа  в личный кабинет нужно авторизоваться ");
        }

        $emailActiv = User::where("id", Auth::id())->first()->email_activ;

        if (!$emailActiv) {
            return redirect()->home()->with("message-danger", "Доступ в личный кабинет только после подтвержлдения email ");
        }

        return $next($request);

    }
}
