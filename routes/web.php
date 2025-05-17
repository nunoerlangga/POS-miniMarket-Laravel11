<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Routes untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes yang butuh login
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    // Produk & Pelanggan bisa diakses semua role
    Route::get('produk', [ProdukController::class, 'index']);
    Route::get('produk/add', [ProdukController::class, 'create']);
    Route::post('produk/add', [ProdukController::class, 'store']);
    Route::get('produk/{id}/edit', [ProdukController::class, 'edit']);
    Route::patch('produk/{id}/edit', [ProdukController::class, 'update']);
    Route::delete('produk/{id}/delete', [ProdukController::class, 'destroy']);


    Route::get('pelanggan', [PelangganController::class, 'index']);
    Route::get('pelanggan/add', [PelangganController::class, 'create']);
    Route::post('pelanggan/add', [PelangganController::class, 'store']);
    Route::get('pelanggan/{id}/edit', [PelangganController::class, 'edit']);
    Route::patch('pelanggan/{id}/edit', [PelangganController::class, 'update']);
    Route::delete('pelanggan/{id}/delete', [PelangganController::class, 'destroy']);


    // Group route users, hanya untuk admin saja
    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::get('users', [AuthController::class, 'index']);
        Route::get('users/add', [AuthController::class, 'create']);
        Route::post('users/add', [AuthController::class, 'store']);
        Route::get('users/{id}/edit', [AuthController::class, 'edit']);
        Route::patch('users/{id}/edit', [AuthController::class, 'update']);
        Route::delete('users/{id}/delete', [AuthController::class, 'destroy']);
    });
});
