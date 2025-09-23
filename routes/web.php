<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use  App\Http\Controllers\Admin\PesananController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Halaman utama untuk menampilkan semua produk
Route::get('/', [ProdukController::class, 'index'])->name('home');

// Halaman untuk menampilkan detail satu produk
Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');

// Halaman untuk menampilkan produk berdasarkan kategori
Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');

// Rute untuk admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Contoh: Route untuk mengelola produk di admin
    Route::resource('produk', AdminProdukController::class);
    // URL akan menjadi: /admin/produk, /admin/produk/create, dll.
    Route::resource('kategori', KategoriController::class);
    Route::resource('pesanan', PesananController::class);
});

require __DIR__.'/auth.php';
