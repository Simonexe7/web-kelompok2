<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Semua user login
Route::middleware(['auth'])->group(function () {

    // Owner & Manager
    Route::get('/laporan', function () {
        return "Halaman Laporan";
    })->middleware('role:owner,manager');

    // Kasir
    Route::get('/transaksi', function () {
        return "Halaman Transaksi";
    })->middleware('role:kasir');

});


require __DIR__.'/auth.php';
