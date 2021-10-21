<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;

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
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
