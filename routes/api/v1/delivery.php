<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TestController;
use App\Http\Controllers\Api\V1\Delivery\LoginController;
use App\Http\Controllers\Api\V1\Delivery\ProfileController;
use App\Http\Controllers\Api\V1\Delivery\RegisterController;


/**
 * 
 * Api for delivery boy app
 * 
 * Base route: /api/v1/delivery
 */

Route::get('test', [TestController::class, 'test']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('test-auth', [TestController::class, 'testAuth']);
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('profile', [ProfileController::class, 'getProfile']);
    Route::put('profile', [ProfileController::class, 'updateProfile']);
    Route::post('change-password', [LoginController::class, 'changePassword']);
    // Route::get('orders', [OrdersController::class, 'orders']);
    // Route::get('orders/{order}', [OrdersController::class, 'order']);
    // Route::post('orders/{order}/complete', [OrdersController::class, 'complete']);
    // Route::post('orders/{order}/cancel', [OrdersController::class, 'cancel']);
    // Route::post('orders/{order}/pickup', [OrdersController::class, 'pickup']);
    // Route::post('orders/{order}/deliver', [OrdersController::class, 'deliver']);
    // Route::post('orders/{order}/rate', [OrdersController::class, 'rate']);
}); 