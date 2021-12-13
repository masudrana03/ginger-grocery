<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TestController;
use App\Http\Controllers\Api\V1\Delivery\LoginController;
use App\Http\Controllers\Api\V1\Delivery\ProfileController;
use App\Http\Controllers\Api\V1\Delivery\RegisterController;
use App\Http\Controllers\Api\V1\Delivery\TransportController;
use App\Http\Controllers\Api\V1\Delivery\DeliveryManReviewController;
use App\Http\Controllers\Api\V1\Delivery\FaqController;
use App\Http\Controllers\Api\V1\Delivery\OrderController;

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
    Route::post('change-password', [LoginController::class, 'changePassword']);

    Route::get('profile', [ProfileController::class, 'getProfile']);
    Route::put('profile', [ProfileController::class, 'updateProfile']);
    Route::get('check-status/{id}', [ProfileController::class, 'getStatus']);

    Route::post('register-doc/{id}', [TransportController::class, 'getRegistationDoc']);
    Route::post('vehicle-info/{id}', [TransportController::class, 'Update']);


    Route::post('delivery-man-review', [DeliveryManReviewController::class, 'addDeliveryManRating']);

    Route::get('delivery-man-faq', [FaqController::class, 'getFaqlist']);

    Route::get('orders', [OrderController::class, 'orders']);
    Route::get('orders/{order}/{status}', [OrderController::class, 'updateStatus']);
    Route::get('orders/{id}', [OrderController::class, 'getOrderDetails']);
    Route::get('orders/{id}/customer/details', [OrderController::class, 'getCustomerDetails']);
    Route::post('delivery-man-otp/{id}', [OrderController::class, 'getOtp']);
    Route::post('delivery-man-otp-verify/{id}/{otp}', [OrderController::class, 'getOtpVerify']);


    // Route::post('orders/{order}/complete', [OrdersController::class, 'complete']);
    // Route::post('orders/{order}/cancel', [OrdersController::class, 'cancel']);
    // Route::post('orders/{order}/pickup', [OrdersController::class, 'pickup']);
    // Route::post('orders/{order}/deliver', [OrdersController::class, 'deliver']);
    // Route::post('orders/{order}/rate', [OrdersController::class, 'rate']);





});
