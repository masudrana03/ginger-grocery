<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TaxController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\SocialLoginController;
use App\Components\Payment\Single\StripePayment;
use App\Http\Controllers\CallToActionController;
use App\Http\Controllers\ContactWithUsController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Api\V1\CheckoutController;
use App\Http\Controllers\ShippingServiceController;
use App\Http\Controllers\DeliveryManReviewController;
use App\Http\Controllers\DeliveryManDetailsController;
use App\Http\Controllers\Frontend\CartController as FrontendCartController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\Frontend\AboutController as FrontendAboutController;
use App\Http\Controllers\Frontend\StoreController as FrontendStoreController;
use App\Http\Controllers\Frontend\VendorController as FrontendVendorController;
use App\Http\Controllers\Frontend\CompareController as FrontendCompareController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\CheckoutController as FrontendCheckoutController;
use App\Http\Controllers\Frontend\WishlistController as FrontendWishlistController;
use App\Http\Controllers\Frontend\SocialiteController as FrontendSocialiteController;
use App\Http\Controllers\Frontend\ForgotPasswordController as FrontendForgotPasswordController;

Route::get('/installcheck', function () {
    return view('auth.login');
});

// Route::get('/getCode', function () {
//     return view('install');
// });

// Route::get('/getCode', function () {
//    [ InstallController::class, 'getCode'];
// })->middleware('allowInstall');

Route::get('/getCode', [InstallController::class, 'getCode'])->name('getCode')->middleware('allowInstall');

// Route::post('/valideCodeCheck', function () {
//     // return request()->all();
// });

Route::post('/valideCodeCheck', [InstallController::class, 'valideCodeCheck'])->name('valideCodeCheck');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return 'Cache is cleared';
});

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
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
    Route::get('/zone/get-coordinates/{id}', [StoreController::class, 'getCoordinates'])->name('getCoordinates');

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

    Route::get('/social-setting-index', [SocialLoginController::class, 'socialIndex'])->name('settings.social.index');
    Route::post('/update/social-setting-update', [SocialLoginController::class, 'socialUpdate'])->name('settings.social.update');

    Route::get('/allpromos', [PromoController::class, 'allPromos'])->name('allpromos');
    Route::get('/promos/{promo}/update_status', [PromoController::class, 'updateStatus'])->name('promos.update_status');
    Route::get('/allShippingServices', [ShippingServiceController::class, 'allShippingServices'])->name('allShippingServices');
    Route::get('/shipping_services/{shipping_service}/update_status', [ShippingServiceController::class, 'updateStatus'])->name('shipping_services.update_status');
    Route::get('/allTaxes', [TaxController::class, 'allTaxes'])->name('allTaxes');
    Route::get('/taxes/{tax}/update_status', [TaxController::class, 'updateStatus'])->name('taxes.update_status');
    Route::get('/points/{point}/update_status', [PointController::class, 'updateStatus'])->name('points.update_status');
    Route::post('/points/settings/update', [PointController::class, 'settingsUpdate'])->name('points.settings.update');

    // Route::get('/zone', [ZoneController::class, 'index'])->name('zone.index');
    // Route::get('/zone-add', [ZoneController::class, 'create'])->name('zone.create');
    // Route::get('get-all-zone-cordinates/{id?}', [ZoneController::class, 'get_all_zone_cordinates'])->name('zoneCoordinates');
    Route::get('allzones', [ZoneController::class, 'allZones'])->name('allzones');
    Route::get('/zones/{zone}/update_status', [ZoneController::class, 'updateStatus'])->name('zones.update_status');

    Route::get('/all-delivery-men', [DeliveryManDetailsController::class, 'allDeliveryManDetails'])->name('allDeliveryManDetails');
    Route::get('/delivery-men/{deliveryMan}/update_status', [DeliveryManDetailsController::class, 'updateStatus'])->name('delivery_men.update_status');
    Route::get('/delivery-men/{deliveryMan}/update_online_status', [DeliveryManDetailsController::class, 'updateOnlineStatus'])->name('delivery_men.update_online_status');

    Route::get('/delivery-man-review', [DeliveryManReviewController::class, 'index'])->name('delivery_man_review');
    Route::get('/delivery-Reviews', [DeliveryManReviewController::class, 'getDeliveryReviews'])->name('getDeliveryManReviews');

    Route::get('/faq', [FaqController::class, 'getFaq'])->name('getFaq');
    Route::get('/faq-status/{faq}/update_status', [FaqController::class, 'updateStatus'])->name('faqs.update_status');

    // Route::get('/call-to-action/edit', [CallToActionController::class, 'editn'])->name('');
    Route::get('/call-to-action/{callToAction}/update_status', [CallToActionController::class, 'updateStatus'])->name('callToAction.update_status');

    Route::get('/contact-us', [ContactWithUsController::class, 'allContactsMassage'])->name('all_contacts');
    Route::get('/contact-massage', [ContactWithUsController::class, 'contactMassage'])->name('contact.massage');

    Route::post('/about-update', [AboutController::class, 'update'])->name('about.update');
    Route::get('/about-slider-index', [AboutController::class, 'sliderIndex'])->name('about.slider.index');
    Route::post('/about-slider-update', [AboutController::class, 'sliderUpdate'])->name('about.slider.update');
    Route::get('/about-service-index', [AboutController::class, 'serviceIndex'])->name('about.service.index');
    Route::get('/about-service-edit', [AboutController::class, 'serviceEdit'])->name('about.service.edit');
    Route::post('/about-service-update', [AboutController::class, 'serviceUpdate'])->name('about.service.update');
    Route::get('/about-our-performance', [AboutController::class, 'aboutPerformance'])->name('about.performance');

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
    Route::resource('zones', ZoneController::class);
    Route::resource('delivery_men', DeliveryManDetailsController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('call_to_actions', CallToActionController::class);
    Route::resource('contacts', ContactWithUsController::class);
    Route::resource('abouts', AboutController::class);
});

//Frontend Route
Route::get('/privacy-policy', function () {
    return 'This is privacy policy page';
});

Route::get('/terms', function () {
    return 'This is terms page';
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/', [HomeController::class, 'ajax'])->name('index.part.ajax');
Route::get('/products/{id}', [HomeController::class, 'productDetails'])->name('products');
Route::post('/products-rating/{id}', [HomeController::class, 'productRating'])->name('product.rating');
Route::get('/categories/{id}', [HomeController::class, 'categoryDetails'])->name('categories');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::post('/location', [HomeController::class, 'getZone'])->name('location');

Route::middleware(['auth'])->group(function () {
    Route::get('/add-to-cart/{id}', [FrontendCartController::class, 'addToCartById'])->name('cartById');
    Route::get('/add-to-cart-ajax/{id}', [FrontendCartController::class, 'ajaxAddToCartById'])->name('ajaxCartById');
    Route::get('/cart', [FrontendCartController::class, 'cart'])->name('cart');
    Route::post('/cart-update', [FrontendCartController::class, 'cartUpdate'])->name('cart.update');
    Route::get('/cart-product-remove/{id}', [FrontendCartController::class, 'removeToCartById'])->name('cart.remove');
    Route::get('/checkout', [FrontendCheckoutController::class, 'checkout'])->name('checkout');
    Route::post('apply-promo', [FrontendCheckoutController::class, 'applyPromo']);
    Route::post('place-order', [FrontendCheckoutController::class, 'placeOrder']);
    Route::get('shipping-fee-calculation',[CheckoutController::class,'ajaxShippingCalculation'])->name('ajax.shipping.calculation');
});

Route::get('/user', [FrontendUserController::class, 'index'])->name('user.dashboard');
Route::get('/user/orders', [FrontendUserController::class, 'getOrders'])->name('user.orders');
Route::get('/user/track-orders', [FrontendUserController::class, 'getTrackOrders'])->name('user.track.orders');
Route::get('/user/address', [FrontendUserController::class, 'getAddress'])->name('user.address');
Route::get('/user/profile', [FrontendUserController::class, 'getProfile'])->name('user.profile');
Route::post('/user/profile-update', [FrontendUserController::class, 'updateProfile'])->name('user.profile.update');
Route::get('/user/change-password', [FrontendUserController::class, 'changePassword'])->name('user.change.password');
Route::post('/user/update-password', [FrontendUserController::class, 'updatePassword'])->name('user.update.password');
Route::get('/user/order-invoice/{id}', [FrontendUserController::class, 'getInvoice'])->name('user.invoice');
Route::post('/user/address-create', [FrontendUserController::class, 'addAddress'])->name('user.add.address');
Route::post('/user/address-update/{id}', [FrontendUserController::class, 'updateAddress'])->name('user.update.address');
Route::post('/user/address-delete/{id}', [FrontendUserController::class, 'destroyAddress'])->name('user.delete.address');

Route::get('/user/forgot-password', [FrontendForgotPasswordController::class, 'index'])->name('user.forget.index');
Route::get('/user/reset-password-view', [FrontendForgotPasswordController::class, 'resetPasswordView'])->name('user.reset.view');
Route::post('/user/forgot-password-otp', [FrontendForgotPasswordController::class, 'sendOtp'])->name('user.forget.otp');
Route::post('/user/forgot-password-submit', [FrontendForgotPasswordController::class, 'resetPasswordOtp'])->name('user.forget');
Route::post('reset-password-submit', [FrontendForgotPasswordController::class, 'resetPassword'])->name('user.password.reset');

Route::get('/compare', [FrontendCompareController::class, 'compare'])->name('compare');
Route::get('/compare-product/{id}', [FrontendCompareController::class, 'compareProduct'])->name('compareProduct');

Route::get('/wishlist', [FrontendWishlistController::class, 'index'])->name('wishlist.index');
Route::get('/wishlist-product/{id}', [FrontendWishlistController::class, 'addToWishlistById'])->name('wishlist');
Route::get('/wishlist-product-remove/{id}', [FrontendWishlistController::class, 'removeToWishlistById'])->name('wishlist.remove');

Route::get('/shop-product/{id}', [FrontendStoreController::class, 'storeById'])->name('shop.product');

Route::get('/payment_from_card/{invoice_id}', [StripePayment::class, 'paymentFromCard'])->name('payment_from_card');
Route::get('payment-success/{invoice_id}/{payment_method_id}', [StripePayment::class, 'paymentSuccess'])->name('payment_success');
Route::get('payment-from-saved-card/{order_id}/{payment_method_id}', [StripePayment::class, 'paymentFromSavedCard'])->name('payment_from_saved_card');

Route::get('/contact', [FrontendContactController::class, 'contact'])->name('contact');
Route::post('/contact-massage-from', [FrontendContactController::class, 'contactMassage'])->name('frontend.contact.massage');

Route::get('/about', [FrontendAboutController::class, 'about'])->name('about');

Route::get('/vendor-list', [FrontendVendorController::class, 'vendorIndex'])->name('vendor.list');
Route::get('/vendor-details/{id}', [FrontendVendorController::class, 'vendorDetails'])->name('vendor.details');
// Route::get('/sort/{slug}', [FrontendVendorController::class, 'ajaxSort'])->name('vendor.sort');

//For Google
Route::get('login/google', [FrontendSocialiteController::class, 'googleRedirectToProvider'])->name('login.google');
Route::get('login/google/callback', [FrontendSocialiteController::class, 'googleHandleProviderCallback'])->name('login.google_callback');

//For Facebook
Route::get('login/facebook', [FrontendSocialiteController::class, 'facebookRedirectToProvider'])->name('login.facebook');
Route::get('login/facebook/callback', [FrontendSocialiteController::class, 'facebookHandleProviderCallback'])->name('login.facebook_callback');

Route::get('c/{id}', function ($id) {

    $wishListProducts = Cache::get('products');

    if (! $wishListProducts) {
        Cache::put('products', [$id], 30);
        return Cache::get('products');
    }

    if (in_array($id, $wishListProducts)) {
        return Cache::get('products');
    }

    if (count($wishListProducts) >= 3) {
        array_shift($wishListProducts);
        array_push($wishListProducts, $id);
        Cache::put('products', $wishListProducts, 30);
        return Cache::get('products');
    }

    array_push($wishListProducts, $id);
    Cache::put('products', $wishListProducts, 30);
    return Cache::get('products');

    // $wishListProducts = Session::get('products');

    // if (! $wishListProducts) {
    //     Session::put('products', [$id], 30);
    //     return Session::get('products');
    // }

    // if (in_array($id, $wishListProducts)) {
    //     return Session::get('products');
    // }

    // if (count($wishListProducts) >= 3) {
    //     array_shift($wishListProducts);
    //     array_push($wishListProducts, $id);
    //     Session::put('products', $wishListProducts, 30);
    //     return Session::get('products');
    // }

    // array_push($wishListProducts, $id);
    // Session::put('products', $wishListProducts, 30);
    // return Session::get('products');
});

Auth::routes();
