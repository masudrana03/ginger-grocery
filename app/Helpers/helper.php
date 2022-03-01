<?php

use App\Models\Tax;
use App\Models\Promo;
use App\Models\Store;
use App\Models\Social;
use App\Models\Address;
use App\Models\ShippingService;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

/**
 * Deletes Image and Thumbnail
 * @param string $image
 * @param string $imageDirectory
 */
function deleteImage($image, $imageDirectory)
{
    deleteFile($imageDirectory . $image);
    deleteFile($imageDirectory . 'thumbnail/' . $image);
}

/**
 * Deletes a file if it exsist
 * @param string $location
 */
function deleteFile($location)
{
    File::exists($location) && File::delete($location);
}

/**
 * Saves a image with thumbnail
 * @param File   $image
 * @param string $location
 * @param string $thumbnailLocation | optional
 */
function saveImageWithThumbnail($image, $location, $thumbnailLocation = false)
{
    $path = explode('/', $location);
    array_pop($path);
    $imageDirectory     = implode('/', $path) . '/';
    $thumbnailDirectory = $imageDirectory . 'thumbnail/';

    makeDirectory($imageDirectory);
    makeDirectory($thumbnailDirectory);

    Image::make($image)->save($location);
    $thumbnailLocation && Image::make($image)->fit(200)->resize(200, 200, function ($constraint) {
        $constraint->aspectRatio();
    })->save($thumbnailLocation);
}

/**
 * Creates a directory if it does not exsist
 *
 * @param  string $location
 * @return void
 */
function makeDirectory($location)
{
    if (!file_exists($location)) {
        mkdir($location);
    }
}

/**
 * Generates a unique filename with extension
 * @param  string $extension
 * @return string unique file name
 */
function generateUniqueFileName($extension)
{
    return now()->toDateString() . '-' . uniqid() . '.' . $extension;
}

/**
 * Validate with validator Make
 * @param array $rules
 */
function validateData($rules)
{
    return Validator::make(request()->all(), $rules);
}

/**
 * @param  $key
 * @return mixed
 */
function settings($key)
{
    /**
     * @var mixed
     */
    /**
     * @param $shop_id
     */
    static $settings;

    if (is_null($settings)) {
        $settings = \Illuminate\Support\Facades\Cache::remember('settings', 24 * 60, function () {
            return \App\Models\Setting::pluck('value', 'key')->toArray();
        });
    }

    return (is_array($key)) ? \Illuminate\Support\Arr::only($settings, $key) : $settings[$key];
}

/**
 * @param  $key as client_id, client_secret, redirect_url
 * @param  $value
 * @return mixed
 */
function updateEnv($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
           "{$key}={$value}",
           file_get_contents($path)
        ));
    }

/**
 * Give me discount of given promo
 *
 * @param string           $total
 * @param string           $type
 * @param integer          $discount
 */
function getAmountAfterDiscount($total, $type, $discount)
{
    if ($type == 'amount') {
        return $total -= $discount;
    }

    return $total -= ($discount / 100) * $total;
}

/**
 * Give me discount of given promo
 *
 * @param \App\Models\Cart $cart
 * @param string           $type       discount type
 * @param integer          $discount
 */
function getDiscountAmount($total, $type, $discount)
{
    if ($type == 'amount') {
        return $discount;
    }

    return ($discount / 100) * $total;
}

/**
 * Give me tax amount
 */
function taxCalculator($total, $storeId)
{
    $taxRate = Store::find($storeId)->tax;

    return round(($taxRate / 100) * $total, 2) ;
}

/**
 * Give me tax amount
 */
function shippingCalculator($total, $storeId, $shippingAddress = null)
{
    $shippingCharge = 0;

    $shippingMethods = ShippingService::active()->whereStoreId($storeId)->get();

    if (empty($shippingMethods)) {
        return $shippingCharge;
    }

    $store = Store::find($storeId);

    foreach ($shippingMethods as $shippingMethod) {
        switch ($shippingMethod->type) {
            case 'Free':
                return 0;
            break;
            case 'Flat rate':
                return $shippingMethod->price;
            break;
            case 'Condition on purchase':
                if ($total < $shippingMethod->to) {
                    $shippingCharge += $shippingMethod->price;
                }
            break;
            case 'Condition on distance':
                if (! $shippingAddress) {
                    return 0;
                }

                $storeAddress = "$store->address $store->state $store->city $store->country->name";
                $distance = getDistance($storeAddress, $shippingAddress);
                if ($distance > $shippingMethod->to) {
                    $shippingCharge += $shippingMethod->price;
                }
            break;
        }
    }

    return $shippingCharge;
}

/**
 * @param $cart
 */
function priceCalculator($cart, $shippingId = null)
{
    $shippingAddress = Address::find($shippingId);
    $subtotal = 0;
    $storeId = '';
    $discount = 0;
    $shipping = 0;

    if (auth()->user()->cart && auth()->user()->cart->promo_id) {
        $promo    = Promo::find(auth()->user()->cart->promo_id);
        $discount = getDiscountAmount($subtotal, $promo->type, $promo->discount);
    }

    foreach ($cart as $item) {
        $subtotal += $item->price * $item->quantity;
        $storeId = $item->store_id;
    }

    if ($shippingAddress) {
        $address = "$shippingAddress->address $shippingAddress->state $shippingAddress->city $shippingAddress->country";
        $shipping = shippingCalculator($subtotal, $storeId, $address);
    } else {
        $shipping = shippingCalculator($subtotal, $storeId);
    }

    $tax      = taxCalculator($subtotal, $storeId);
    $adjust   = 0;

    $total = $subtotal - $discount - $adjust + $shipping + $tax;

    // return ['subtotal' => $subtotal, 'discount' => $discount, 'shipping' => $shipping, 'tax' => $tax, 'total' => $total, 'adjust' => $adjust];
    return ['subtotal' => round($subtotal, 2), 'discount' => round($discount, 2), 'shipping' => round($shipping, 2), 'tax' => round($tax, 2), 'total' => round($total, 2), 'adjust' => round($adjust, 2)];
}

/**
 * Check if the current loggedin user is admin
 * @return  bool
 */
function isAdmin()
{
    return auth()->user()->type == 1;
}

/**
 * Check if the current loggedin user is the shop manager
 *
 * @return  bool
 */
function isShopManager($store_id)
{
    return auth()->user()->type == 2 && auth()->user()->store_id == $store_id;
}

/**
 * Collecting all map coordinates
 *
 * @return  integer
 */
function formatCoordiantes($coordinates)
{
    $data = [];
    foreach ($coordinates as $coord) {
        $data[] = (object)['lat'=>$coord->getlat(), 'lng'=>$coord->getlng()];
    }
    return $data;
}

 /**
  * Calculates the distance between two address
  *
  * @param string $addressFrom
  * @param string $addressTo
  * @return void
  */
function getDistance($addressFrom, $addressTo)
{
    // Google API key
    $apiKey = 'AIzaSyDzdRftDdoy-kMMgxnJTWIrnfOnkHLiJdA&libraries';

    // Change address format
    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
    $formattedAddrTo     = str_replace(' ', '+', $addressTo);

    // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&mode=driving&sensor=true&key='.$apiKey);
    $outputFrom = json_decode($geocodeFrom);
    if (!empty($outputFrom->error_message)) {
        return $outputFrom->error_message;
    }

    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&mode=driving&sensor=true&key='.$apiKey);
    $outputTo = json_decode($geocodeTo);
    if (!empty($outputTo->error_message)) {
        return $outputTo->error_message;
    }

    // Get latitude and longitude from the geodata
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

    // return $this->GetDrivingDistance($lat1, $lat2, $long1, $long2);

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$latitudeFrom.",".$longitudeFrom."&destinations=".$latitudeTo.",".$longitudeTo."&mode=driving&language=pl-PL&key=" . $apiKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
    // $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    return round($dist/1000, 2);
}
