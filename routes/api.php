<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    
    // User routes
    Route::middleware('checkuser')->group(function () {
        Route::get('user/profile', [UserController::class, 'showProfile']);
    Route::get('user/home', [UserController::class, 'home']);
    Route::get('user/products', [UserController::class, 'showProducts']);

    });
   
    // Admin routes
    Route::middleware('checkadmin')->group(function () {
        Route::get('admin/profile', [UserController::class, 'showAdminProfile']);
        Route::put('admin/profile', [UserController::class, 'updateAdminProfile']);
        Route::apiResource('admin/products', ProductController::class);
        Route::get('admin/users', [UserController::class, 'showUsers']);
        Route::patch('admin/users/{id}/role', [UserController::class, 'updateRole']);
    });
});