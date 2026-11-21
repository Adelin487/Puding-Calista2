<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminCatalogController;
use App\Http\Controllers\Admin\AdminPoController;

Route::view('/', 'customer.home')->name('home');

Route::get('/katalog', [CatalogController::class, 'index'])->name('catalog');

// Halaman Pemesanan
Route::get('/pemesanan', [OrderController::class, 'index'])->name('order.index');

// Proses penyimpanan pesanan
Route::post('/pemesanan', [OrderController::class, 'store'])->name('order.store');

Route::get('/pembayaran', [PaymentController::class, 'index'])->name('payment.index');

Route::post('/pembayaran', [PaymentController::class, 'store'])->name('payment.store');

Route::get('/sukses', [SuccessController::class, 'index'])->name('success.index');

// Halaman Login Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');

// Proses Login Admin
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Logout Admin
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Dashboard Admin (Khusus Admin)
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('admin')
    ->name('admin.dashboard');

// Manajemen Pesanan (Khusus Admin)
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/pesanan', [AdminOrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/pesanan/{id}', [AdminOrderController::class, 'show'])
        ->name('orders.show');

    Route::patch('/pesanan/{id}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('orders.updateStatus');

    Route::get('/katalog', [AdminCatalogController::class, 'index'])
        ->name('catalog.index');

    // Jadwal PO
    Route::get('/jadwal-po', [AdminPoController::class, 'index'])
        ->name('po.index');

    Route::put('/jadwal-po/kuota', [AdminPoController::class, 'updateQuota'])
        ->name('po.updateQuota');

    Route::post('/jadwal-po/tutup', [AdminPoController::class, 'closeDate'])
        ->name('po.closeDate');

    Route::delete('/jadwal-po/buka/{id}', [AdminPoController::class, 'openDate'])
        ->name('po.openDate');
    
    Route::put('/katalog/{id}', [AdminCatalogController::class, 'update'])
        ->name('catalog.update');

    Route::delete('/katalog/{id}', [AdminCatalogController::class, 'destroy'])
        ->name('catalog.destroy');
    
    Route::post('/katalog', [AdminCatalogController::class, 'store'])
        ->name('catalog.store');
});