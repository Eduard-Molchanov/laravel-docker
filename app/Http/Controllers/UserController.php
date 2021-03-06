<?php

namespace App\Http\Controllers;

use App\Mail\ActivMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{

    public function register ()
    {
        return view("register");
    }

    public function store (Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed",
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        session()->flash("success", "Вы зарегистрировались успешно!");
        Auth::login($user);
        return redirect()->home();
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function login (Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        if (Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])) {

            return redirect()->route(Auth::user()->roles->role);
//            return redirect()->home();
        }
        return redirect()->back();
    }

    public function logout ()
    {
        Auth::logout();
        return redirect()->route("log-in");
    }

    public function activation ()
    {
        if (Auth::check()) {
            return view("activation");
        } else {
            return "Вам необходимо авторизоваться";
        }

    }

    public function formActivation (Request $request)
    {
        $request->validate([
            "email" => "required|email",
        ]);
        if (Auth::check()) {
            if (Auth::user()->email == $request->email) {
                $token = $request->_token;
//                $body = "Активация учетной записи в Laravel-Docker";
//                $body = "<h3><a href=\"http://sogasie.test/activelink/{$token}\">активировать учетную запись на сайте sogasie.test</a></h3>";
                $body = "<h3><a href=" . route('activelink', ["token" => $token]) . ">активировать учетную запись на сайте sogasie.test</a></h3>";
                Mail::to($request->email)->send(new ActivMail($body));

                session()->flash("success", "На Email $request->email выслано письмо с сылкой для активации учетной записи");

                User::where("id", Auth::id())->update([
                    "remember_token" => $token,
                ]);

//                session(["token" => $token]);

                return redirect()->home();
            } else {
                return "Некорректный Email";
            }
        } else {
            return "Вам необходимо авторизоваться";
        }


    }


    public function newPassword (Request $request)
    {
        return view("new-password");
    }

    public function updatePassword (Request $request)
    {
        $request->validate([
            "password" => "required|confirmed",
            "password_confirmation" => "required"
        ]);
        $user = User::where("id", Auth::id())->update([
            "password" => Hash::make($request->password),
        ]);
        session()->flash("success", "Вы успешно обновили пароль!");

        return redirect()->home();
    }

    public function activeLink ($token)
    {
//        $sessionToken = session()->get("token");
        $DbToken = User::where("id", Auth::id())->value("remember_token");

        if ($DbToken === $token) {
            session()->flash("success", "Вы успешно активировали учетную запись!");
            $user = User::where("id", Auth::id())->update([
                "email_activ" => 1,
            ]);
            return redirect()->home();
        }
        return redirect()->home();
    }
}
