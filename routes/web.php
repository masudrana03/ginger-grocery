<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\ShippingServiceController;

Route::get('/', function () {
    return view('auth.login');
});


Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function () {

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
    Route::get('/allbanners', [BannerController::class, 'allBanners'])->name('allbanners');
    Route::get('/banners/{banner}/update_status', [BannerController::class, 'updateStatus'])->name('banners.update_status');
    Route::get('/all_order_statuses', [OrderStatusController::class, 'allOrderStatuses'])->name('all_order_statuses');
    Route::get('/all_orders', [OrderController::class, 'allOrders'])->name('all_orders');
    Route::get('/orders/{order}/update_status/{orderStatus}', [OrderController::class, 'updateStatus'])->name('orders.update_status');
    Route::get('/orders/{order}/updatePaymentStatus', [OrderController::class, 'updatePaymentStatus'])->name('orders.updatePaymentStatus');

    Route::get('/allcarts', [CartController::class, 'allCarts'])->name('allcarts');

    Route::get('/general-settings', [SettingController::class, 'generalSetting'])->name('settings.general');
    Route::get('/email-settings', [SettingController::class, 'emailSetting'])->name('settings.email');
    Route::get('/payment-settings', [SettingController::class, 'paymentGatewaySetting'])->name('settings.payment_gateway');
    Route::post('/general-settings', [SettingController::class, 'generalSettingsUpdate'])->name('settings.general.update');
    Route::post('/email-settings', [SettingController::class, 'emailSettingsUpdate'])->name('settings.email.update');
    Route::post('/payment-settings', [SettingController::class, 'paymentSettingsUpdate'])->name('settings.payment.update');
    Route::post('/send-test-email', [SettingController::class, 'sendTestMail'])->name('send_test_email');
    Route::get('/allpromos', [PromoController::class, 'allPromos'])->name('allpromos');
    Route::get('/promos/{promo}/update_status', [PromoController::class, 'updateStatus'])->name('promos.update_status');
    Route::get('/allShippingServices', [ShippingServiceController::class, 'allShippingServices'])->name('allShippingServices');
    Route::get('/shipping_services/{shipping_service}/update_status', [ShippingServiceController::class, 'updateStatus'])->name('shipping_services.update_status');
    Route::get('/allTaxes', [TaxController::class, 'allTaxes'])->name('allTaxes');
    Route::get('/taxes/{tax}/update_status', [TaxController::class, 'updateStatus'])->name('taxes.update_status');
    Route::get('/points/{point}/update_status', [PointController::class, 'updateStatus'])->name('points.update_status');
    Route::post('/points/settings/update', [PointController::class, 'settingsUpdate'])->name('points.settings.update');

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
    Route::resource('banners', BannerController::class);
    Route::resource('order_statuses', OrderStatusController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('carts', CartController::class);
    Route::resource('email_templates', EmailTemplateController::class);
    Route::resource('points', PointController::class);
    Route::resource('promos', PromoController::class);
    Route::resource('shipping_services', ShippingServiceController::class);
    Route::resource('taxes', TaxController::class);
});


//Frontend Route
Route::get('/privacy-policy', function () {
    return 'This is privacy policy page';
});

Route::get('/terms', function () {
    return 'This is terms page';
});

Route::get('/test', [HomeController::class, 'index'])->name('index');
Route::get('/user', [FrontendUserController::class, 'index'])->name('index');
Route::get('/user-orders', [FrontendUserController::class, 'getOrders'])->name('user.orders');
Route::get('/user-track-odres', [FrontendUserController::class, 'getTrackOrders'])->name('user.track.orders');
Route::get('/user-address', [FrontendUserController::class, 'getAddress'])->name('user.address');
Route::get('/user-profile', [FrontendUserController::class, 'getProfile'])->name('user.profile');

Auth::routes();
