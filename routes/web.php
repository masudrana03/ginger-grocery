<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
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
    Route::get('/allbrands', [BrandController::class, 'allBrands'])->name('allbrands');
    Route::resource('brands', BrandController::class);
    Route::get('/alltypes', [TypeController::class, 'allTypes'])->name('alltypes');
    Route::resource('types', TypeController::class);
    Route::get('/allunits', [UnitController::class, 'allUnits'])->name('allunits');
    Route::resource('units', UnitController::class);
    Route::get('/allcurrencies', [CurrencyController::class, 'allCurrencies'])->name('allcurrencies');
    Route::resource('currencies', CurrencyController::class);
    Route::get('/allnutrition', [NutritionController::class, 'allNutrition'])->name('allnutrition');
    Route::resource('nutrition', NutritionController::class);
    Route::get('/allcategories', [CategoryController::class, 'allCategories'])->name('allcategories');
    Route::resource('categories', CategoryController::class);
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
