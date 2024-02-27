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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('pages.Auth.login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('pages.Auth.register');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('pages.dashboard')->middleware("auth");
Route::get('/create', [ProductController::class, 'showCreate'])->name('pages.create');
Route::post('/', [LoginController::class, 'login'])->name('pages.Auth.login');
Route::post('/register', [RegisterController::class, 'register'])->name('pages.Auth.register');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::post('/create', [ProductController::class, 'create'])->name('create_product');



