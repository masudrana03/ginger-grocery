<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TestController;
use App\Http\Controllers\Api\V1\TypeController;
use App\Http\Controllers\Api\V1\BrandController;
use App\Http\Controllers\Api\V1\BannerController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\StoreController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\NutritionController;
use App\Http\Controllers\Api\V1\RegisterController;
use App\Http\Controllers\Api\V1\ResetPasswordController;
use App\Http\Controllers\Api\V1\CartDetailsController;
use App\Http\Controllers\Api\V1\AddressController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
|
| if you want to add api v2, add a v2 folder with api.php
| and update app/Providers/RouteServiceProvider.php with new code block
|
*/

Route::get('test', [TestController::class, 'test']);

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('test-auth', [TestController::class, 'testAuth']);

    Route::get('logout', [LoginController::class, 'logout']);

    Route::post('send-otp', [ResetPasswordController::class, 'sendOtp']);
    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);

    Route::get('profile', [ProfileController::class, 'getProfile']);
    Route::post('profile', [ProfileController::class, 'updateProfile']);
    Route::post('change-password', [LoginController::class, 'changePassword']);


});
Route::get('category', [CategoryController::class, 'getCategories']);
Route::get('category/{id}', [CategoryController::class, 'categoryDetails']);

Route::get('banner',[BannerController::class, 'getBanners']);
Route::get('banner/{id}',[BannerController::class,'bannerDetails']);

Route::get('brand', [BrandController::class, 'getBrands']);
Route::get('brand/{id}', [BrandController::class, 'brandDetails']);

Route::get('store', [StoreController::class, 'getStores']);
Route::get('store/{id}', [StoreController::class, 'storeDetails']);

Route::get('type', [TypeController::class, 'getTypes']);

Route::get('product', [ProductController::class, 'getProducts']);
Route::get('product/{id}', [ProductController::class, 'productDetails']);

Route::get('order-list/{userId}',[OrderController::class, 'orderList']);
Route::get('order-details/{orderId}',[OrderController::class, 'OrderDetails']);

Route::get('nutrition',[NutritionController::class, 'getNutritions']);
Route::get('nutrition/{id}',[NutritionController::class, 'nutritionDetails']);

Route::get('card-details/{cartId}',[CartDetailsController::class, 'getCardDetails']);

Route::post('address',[AddressController::class, 'store']);
Route::get('address/{userId}',[AddressController::class, 'show']);

