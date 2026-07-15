<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // brands
    Route::resource('brands', BrandController::class)->except(['show'])->names('brands');
});

// customer
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('dashboard', function () {
        return view('customer.dashboard.index');
    })->name('dashboard');
});

Route::get('products', function () {
    return view('customer.product');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
