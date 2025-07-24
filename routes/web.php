<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\MobilController;



Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
   Route::resource('/mobil', MobilController::class);
   Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
   Route::get('/admin/sewa/{id}', [AdminController::class, 'sewa'])->name('admin.sewa.sewa');
   Route::post('/admin/sewa/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.sewa.status');
   Route::delete('/admin/sewa/{id}', [AdminController::class, 'destroy'])->name('admin.sewa.destroy');
});

Route::middleware('auth')->group(function () {
   Route::get('/logout', [AuthController::class, 'logout']);

   
   Route::get('/rental/{id}', [RentalController::class, 'form'])->name('rental');
   Route::post('/rental', [RentalController::class, 'store'])->name('rental.store');
});
