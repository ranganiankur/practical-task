<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedAdminSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// User
Route::get('/user-login', [AuthenticatedSessionController::class, 'create'])->name('user_login');
Route::post('/user-login-process', [AuthenticatedSessionController::class, 'store'])->name('user_login_process');
Route::get('/user-register', [RegisteredUserController::class, 'create'])->name('user_register');
Route::post('/user-store', [RegisteredUserController::class, 'store'])->name('user_store');

// Admin
Route::get('/admin-login', [AuthenticatedAdminSessionController::class, 'create'])->name('admin_login');
Route::post('/admin-login-process', [AuthenticatedAdminSessionController::class, 'store'])->name('admin_login_process');
Route::get('/admin-register', [RegisteredAdminController::class, 'create'])->name('admin_register');
Route::post('/admin-store', [RegisteredAdminController::class, 'store'])->name('admin_store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
