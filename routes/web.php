<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

Route::middleware(['guest'])->group(function () {
    // Define routes for guests (unauthenticated users)
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('pages.Auth.login');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('pages.Auth.register');
    Route::post('/', [LoginController::class, 'login'])->name('pages.Auth.login');
    Route::post('/register', [RegisterController::class, 'register'])->name('pages.Auth.register');
});

Route::middleware(['auth'])->group(function () {
    // Define routes for authenticated users
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('pages.dashboard');
    Route::get('/dashboard/showproduct', [DashboardController::class, 'showProduct'])->name('pages.dashboard.showproduct');
    Route::get('/create', [ProductController::class, 'showCreate'])->name('pages.create');
    Route::get('/{product}/edit', [ProductController::class, 'showEdit'])->name('pages.edit');
    Route::get('/dashboard/search', [ProductController::class, 'search'])->name('search');
    Route::get('/supplier', [SupplierController::class, 'showSupplier'])->name('pages.supplier');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('pages.supplier.create');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::post('/create', [ProductController::class, 'create'])->name('create_product');
    Route::delete('/dashboard/{product}', [ProductController::class, 'delete'])->name('destroy'); // Corrected route name
    Route::put('/edit/{product}', [ProductController::class, 'edit'])->name('update_product');
});












