<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    
});

Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::get('/editor', function () {
        return 'Halaman Editor — Akses berhasil!';
    })->name('editor.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', function () {
        return 'Halaman User — Akses berhasil!';
    })->name('user.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
});