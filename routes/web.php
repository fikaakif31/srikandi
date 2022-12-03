<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


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

Route::get('/', [HomeController::class, 'Home']);

Route::group(['prefix' => 'user/'], function () {
    Route::get("daftar", [UserController::class, "Daftar"]);
    Route::post("process-daftar", [UserController::class, "ProcessDaftar"]);

    Route::get("login", [UserController::class, "Login"]);
    Route::post("process-login", [UserController::class, "ProcessLogin"]);

    // log out
    Route::get("proses-logout", [UserController::class, "prosesLogout"]);
});

// route user
Route::get('/user', [HomeController::class, 'tampilan'])->middleware(['auth', 'check-access:0']);
Route::get('/admin', [AdminController::class, 'KelolaAdmin'])->middleware(['auth', 'check-access:1']);

