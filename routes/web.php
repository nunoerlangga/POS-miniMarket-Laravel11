<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    // Produk
    Route::get('produk', [ProdukController::class, 'index']);
    Route::get('produk/add', [ProdukController::class, 'create']); // Form tambah produk
    Route::post('produk/add', [ProdukController::class, 'store']); // Menyimpan produk baru
    Route::get('produk/{id}/edit', [ProdukController::class, 'edit']); // Menyimpan produk baru
    Route::patch('produk/{id}/edit', [ProdukController::class, 'update']); // Menyimpan produk baru
    Route::delete('produk/{id}/delete', [ProdukController::class, 'destroy']);
    // Pelanggan
    Route::get('pelanggan',[PelangganController::class,'index']);
    Route::get('pelanggan/add',[PelangganController::class,'create']);
    Route::post('pelanggan/add',[PelangganController::class,'store']);
    Route::get('pelanggan/{id}/edit',[PelangganController::class,'edit']);
    Route::patch('pelanggan/{id}/edit',[PelangganController::class,'update']);
    Route::delete('pelanggan/{id}/delete',[PelangganController::class,'destroy']);
});
