<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function guest ()
    {
        return view("pages.guest");
    }

    public function user ()
    {
        return view("pages.user");
    }

    public function agent ()
    {
        return view("pages.agent");
    }

    public function admin ()
    {
        return view("pages.admin");
    }

    public function system ()
    {
        return view("pages.system");
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
            $this->authorize("view-role-page");
        }
        return redirect()->home();

    }
}
