<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NutritionController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Datatables routes
    Route::get('/allbrands', [BrandController::class, 'allBrands'])->name('allbrands');
    Route::get('/alltypes', [TypeController::class, 'allTypes'])->name('alltypes');
    Route::get('/allunits', [UnitController::class, 'allUnits'])->name('allunits');
    Route::get('/allcurrencies', [CurrencyController::class, 'allCurrencies'])->name('allcurrencies');
    Route::get('/allnutrition', [NutritionController::class, 'allNutrition'])->name('allnutrition');
    Route::get('/allcategories', [CategoryController::class, 'allCategories'])->name('allcategories');
    Route::get('/allstores', [StoreController::class, 'allStores'])->name('allstores');
    Route::get('/allusers', [UserController::class, 'allUsers'])->name('allusers');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('user.change_password');
    Route::post('/user/update-password', [UserController::class, 'passwordUpdate'])->name('user.update_password');
    Route::get('/allproducts', [ProductController::class, 'allProducts'])->name('allproducts');

    
    // Resource routes
    Route::resource('brands', BrandController::class);
    Route::resource('types', TypeController::class);
    Route::resource('units', UnitController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::resource('nutrition', NutritionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('stores', StoreController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});