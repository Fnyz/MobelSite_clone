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
use App\Http\Controllers\TransactionController;


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

    //supplier route
    Route::get('/supplier', [SupplierController::class, 'showSupplier'])->name('pages.supplier');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('pages.supplier.create');
    Route::get('/supplier/getAllSupplier', [SupplierController::class, 'getAllSupplier']);
    Route::get('/supplier/search', [SupplierController::class, 'search'])->name('supplier.search');
    Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'showEdit']);


    //transaction route
    Route::get('/transaction', [TransactionController::class, 'showTransaction'])->name('pages.transaction');
    Route::get('/transaction/getSupplierAndProduct', [TransactionController::class, 'getProductandSupplier']);
    Route::get('/transaction/addTransacation', [TransactionController::class, 'showAddTransac'])->name('pages.transaction.transac');
    


    Route::post('/supplier/create', [SupplierController::class, 'storeSupplier'])->name('storeSupplier');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::post('/create', [ProductController::class, 'create'])->name('create_product');
    Route::delete('/dashboard/{product}', [ProductController::class, 'delete'])->name('destroy'); // Corrected route name
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'delete'])->name('destroy'); // Corrected route name

    Route::put('/edit/{product}', [ProductController::class, 'edit'])->name('update_product');
    Route::put('/supplier/edit/{supplier}', [SupplierController::class, 'edit'])->name('update_supplier');
});












