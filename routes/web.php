<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BarangController,
    KategoriController,
    UserController,
    ProfileController,
    DashboardController
};
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    LogoutController
};

// ======================
// ROUTE HALAMAN UMUM
// ======================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ======================
// AUTHENTICATION
// ======================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// ======================
// PROTEKSI LOGIN
// ======================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Barang
    Route::resource('barang', BarangController::class);

    // CRUD Kategori
    Route::resource('kategori', KategoriController::class);

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Hanya Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('user', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    });
});
