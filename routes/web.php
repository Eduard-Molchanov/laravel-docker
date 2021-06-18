<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
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
//Route::post('/login', [RoleController::class, "roles"])->name("login");

Route::get("/logout", [UserController::class, "logout"])->name("logout");

Route::get("/activation", [UserController::class, "activation"])->name("activation");
Route::post("/activation", [UserController::class, "formActivation"])->name("form.activation");
Route::get("/new-password", [UserController::class, "newPassword"])->name("new.password");
Route::post("/new-password", [UserController::class, "updatePassword"])->name("update.password");
Route::get("/activelink/{token}", [UserController::class, "activeLink"]);

Route::get("/guest", [RoleController::class, "guest"])->name("guest");
Route::get("/user", [RoleController::class, "user"])->name("user");
Route::get("/agent", [RoleController::class, "agent"])->name("agent");
Route::get("/admin", [RoleController::class, "admin"])->name("admin");
Route::get("/system", [RoleController::class, "system"])->name("system");

Route::resource("products", ProductController::class);

Route::get("/categories", [CategoryController::class, "index"]);
Route::get("/category/{slug}", [CategoryController::class, "category"]);
Route::get("/product-detail/{id}", [CategoryController::class, "productDetail"]);

//Route::get("/search", [SearchController::class, "index"]);
//Route::post("/search", [SearchController::class, "search"])->name("search");
Route::get("/search", [SearchController::class, "search"])->name("search");

