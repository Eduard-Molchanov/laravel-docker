<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function guest ()
    {
        if (Gate::allows("guest-page-view")) {
            return view("pages.guest");
        }
        return redirect()->back()->with("message-danger", "У вас нет доступа к  странице - Гость");
    }

    public function user ()
    {
        if (Gate::allows("user-page-view")) {
            return view("pages.user");
        }
        return redirect()->back()->with("message-danger", "У вас нет доступа к  странице - User");

    }

    public function agent ()
    {
        if (Gate::allows("agent-page-view")) {
            return view("pages.agent");
        }
        return redirect()->back()->with("message-danger", "У вас нет доступа к  странице - Агент");

    }

    public function admin ()
    {
        if (Gate::allows("admin-page-view")) {
            return view("pages.admin");
        }
        return redirect()->back()->with("message-danger", "У вас нет доступа к  странице - Администратор");

    }

    public function system ()
    {
        if (Gate::allows("system-page-view")) {
            return view("pages.system");
        }
        return redirect()->back()->with("message-danger", "У вас нет доступа к  странице - Система");

    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function roles (Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        if (Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])) {
            return $this->authorize("view-role-page");
//            return 42;
        }
        return redirect()->home();

    }
}
