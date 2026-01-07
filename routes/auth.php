<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    LogoutController
};

// Route Auth terpisah (opsional)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
