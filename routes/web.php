<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    Auth::logout();
    return redirect()->route('login'); 
});

// Authentication Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes 
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('profile', [AdminController::class, 'showProfile'])->name('admin.profile.show');
    Route::post('profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::patch('users/{id}/update-role', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');

    Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});

// User Routes
Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('profile', [UserController::class, 'showProfile'])->name('user.profile.show');
    Route::get('home', [UserController::class, 'home'])->name('user.home');
    Route::get('products', [UserController::class, 'showProducts'])->name('user.products');
});
