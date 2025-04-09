<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\AuthController as UserAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuth::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuth::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        Route::get('users', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::get('users/list', [UserController::class, 'index'])->name('users');
        Route::get('users/export', [UserController::class, 'export'])->name('users.export');
    });
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('login', [UserAuth::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserAuth::class, 'login']);

    Route::middleware('auth:web')->group(function () {
        Route::get('dashboard', [UserAuth::class, 'dashboard'])->name('dashboard');
    });
});
