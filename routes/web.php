<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Actions\Logout;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ServicePriceController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\CipherController;


// =======================
// ROUTE UTAMA
// =======================
Route::view('/', 'home')->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// =======================
// ROUTE ADMIN
// =======================
Route::get('/admin', function () {
    return 'Halaman Admin';
})->middleware('role:admin');

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin')
    ->middleware('role:admin');


// =======================
// ROUTE USER & ORDER
// =======================
Route::middleware(['auth'])->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order');
});

Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio');

Route::middleware(['role:admin|user'])->group(function () {
    Route::get('/order/{category}', [OrderController::class, 'showOrderForm'])->name('order.form');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::put('/admin/orders/{order}/update-progress', [OrderController::class, 'updateProgress'])
        ->name('admin.orders.updateProgress');
});


// =======================
// ROUTE ADMIN FITUR TAMBAHAN
// =======================
Route::middleware(['role:admin'])->group(function () {
    Route::resource('service_prices', ServicePriceController::class)->except('show', 'destroy');
    Route::get('/service-prices', [ServicePriceController::class, 'index'])->name('service_prices.index');
    Route::get('/service-prices/{category}', [ServicePriceController::class, 'index'])->name('service_prices.index');
    Route::get('/service-prices/edit/{id}', [ServicePriceController::class, 'edit'])->name('service_prices.edit');
    Route::put('/service-prices/update/{id}', [ServicePriceController::class, 'update'])->name('service_prices.update');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/harga', [HargaController::class, 'index'])->name('admin.harga');
    Route::get('/admin/manage-prices', [AdminController::class, 'managePrices'])->name('admin.manage_prices');
    Route::post('/admin/update-price/{id}', [AdminController::class, 'updatePrice'])->name('admin.update_price');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
    Route::get('/orders/{id}/edit', [AdminOrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/orders/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
    Route::put('/admin/orders/{id}/progress', [OrderController::class, 'updateProgress'])->name('admin.updateProgress');
});



// =======================
// ROUTE ENKRIPSI DENGAN PIN
// =======================
Route::middleware(['auth'])->group(function () {
    // Halaman input PIN
    Route::get('/cipher', [CipherController::class, 'index'])->name('cipher.index');

    // Proses PIN dan tampilkan hasil
    Route::post('/cipher/result', [CipherController::class, 'result'])->name('cipher.result');
});



// =======================
// AUTH ROUTE
// =======================
require __DIR__ . '/auth.php';
