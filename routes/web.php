<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Semua user login
Route::middleware(['auth'])->group(function () {

    // Owner & Manager
    Route::get('/laporan', function () {
        return "Halaman Laporan";
    })->middleware('role:owner,manager')->name('laporan');

    // Kasir
    Route::get('/transaksi', function () {
        return "Halaman Transaksi";
    })->middleware('role:kasir')->name('transaksi');

    Route::get('/cabang', function () {
        return "Halaman Laporan";
    })->middleware('role:owner,manager')->name('cabang');

});

Route::get('/produk', fn() => view('produk'))->name('produk');
Route::get('/users', fn() => view('users'))->name('users');


require __DIR__.'/auth.php';
