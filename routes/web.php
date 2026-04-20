<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\TransaksiController;
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
    // Route::get('/transaksi', function () {
    //     return "Halaman Transaksi";
    // })->middleware('role:kasir')->name('transaksi');

    Route::get('/transaksi/create', [TransaksiController::class, 'create'])
        ->middleware('role:kasir')
        ->name('transaksi.create');

    Route::post('/transaksi', [TransaksiController::class, 'store'])
        ->middleware('role:kasir')
        ->name('transaksi.store');



    // Route::get('/cabang', function () {
    //     return "Halaman Laporan";
    // })->middleware('role:owner,manager')->name('cabang');

    Route::get('/cabang', [CabangController::class, 'index'])
        ->middleware('role:owner,manager')
        ->name('cabang.index');

    Route::get('/cabang/create', [CabangController::class, 'create'])
        ->middleware('role:owner,manager')
        ->name('cabang.create');

    Route::post('/cabang', [CabangController::class, 'store'])
        ->middleware('role:owner,manager')
        ->name('cabang.store');

    Route::get('/cabang/{id}', [CabangController::class, 'show'])
        ->middleware('role:owner,manager')
        ->name('cabang.show');

    Route::get('/cabang/{cabang}/edit', [CabangController::class, 'edit'])
        ->middleware('role:owner,manager')
        ->name('cabang.edit');

    Route::put('/cabang/{cabang}', [CabangController::class, 'update'])
        ->middleware('role:owner,manager')
        ->name('cabang.update');

    Route::delete('/cabang/{cabang}', [CabangController::class, 'destroy'])
        ->middleware('role:owner,manager')
        ->name('cabang.destroy');
});

Route::get('/produk', fn() => view('produk'))->name('produk');
Route::get('/users', fn() => view('users'))->name('users');



require __DIR__.'/auth.php';
