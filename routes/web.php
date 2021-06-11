<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("home");


Route::get('/register', [UserController::class, "register"]
);

Route::post('/register', [UserController::class, "store"]
)->name("register.store");


Route::get('/login', function () {
    return view('login');
})->name("log-in");

Route::post('/login', [UserController::class, "login"])->name("login");

Route::get("/logout", [UserController::class, "logout"])->name("logout");

Route::get("/activation", [UserController::class, "activation"])->name("activation");
Route::post("/activation", [UserController::class, "formActivation"])->name("form.activation");
Route::get("/new-password", [UserController::class, "newPassword"])->name("new.password");
Route::post("/new-password", [UserController::class, "updatePassword"])->name("update.password");
Route::get("/activelink/{token}", [UserController::class, "activeLink"]);
