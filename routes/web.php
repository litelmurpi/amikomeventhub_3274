<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event-detail/{slug}', [EventController::class, 'show'])->name('event-detail');
Route::get('/checkout/{slug}', [EventController::class, 'checkout'])->name('checkout');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/events', [AdminController::class, 'events'])->name('events');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('transactions');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
});

Route::get('/tentang', function () {
    return "<h1>Ini adalah halaman Tentang Aplikasi Event Hub</h1>";
});
Route::get('/kontak', function () {
    return view('contact');
});
Route::get('/profil', function () {
    return view('profil');
});
Route::get('/katalog', function () {
    return view('katalog');
});
Route::get('/bantuan', function () {
    return view('bantuan');
});
