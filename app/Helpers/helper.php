<?php

use App\Models\Tax;
use App\Models\Promo;
use App\Models\ShippingService;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

/**
 * Deletes Image and Thumbnail
 * @param string $image
 * @param string $imageDirectory
 */
function deleteImage( $image, $imageDirectory ) {
    deleteFile( $imageDirectory . $image );
    deleteFile( $imageDirectory . 'thumbnail/' . $image );
}

/**
 * Deletes a file if it exsist
 * @param string $location
 */
function deleteFile( $location ) {
    File::exists( $location ) && File::delete( $location );
}

/**
 * Saves a image with thumbnail
 * @param File   $image
 * @param string $location
 * @param string $thumbnailLocation | optional
 */
function saveImageWithThumbnail( $image, $location, $thumbnailLocation = false ) {
    $path = explode( '/', $location );
    array_pop( $path );
    $imageDirectory     = implode( '/', $path ) . '/';
    $thumbnailDirectory = $imageDirectory . 'thumbnail/';

    makeDirectory( $imageDirectory );
    makeDirectory( $thumbnailDirectory );

    Image::make( $image )->save( $location );
    $thumbnailLocation && Image::make( $image )->fit( 200 )->resize( 200, 200, function ( $constraint ) {
        $constraint->aspectRatio();
    } )->save( $thumbnailLocation );
}

/**
 * Creates a directory if it does not exsist
 *
 * @param  string $location
 * @return void
 */
function makeDirectory( $location ) {
    if ( !file_exists( $location ) ) {
        mkdir( $location );
    }
}

/**
 * Generates a unique filename with extension
 * @param  string $extension
 * @return string unique file name
 */
function generateUniqueFileName( $extension ) {
    return now()->toDateString() . '-' . uniqid() . '.' . $extension;
}

/**
 * Validate with validator Make
 * @param array $rules
 */
function validateData( $rules ) {
    return Validator::make( request()->all(), $rules );
}

/**
 * @param  $key
 * @return mixed
 */
function settings( $key ) {
    /**
     * @var mixed
     */
    /**
     * @param $shop_id
     */
    static $settings;

    if ( is_null( $settings ) ) {
        $settings = \Illuminate\Support\Facades\Cache::remember( 'settings', 24 * 60, function () {
            return \App\Models\Setting::pluck( 'value', 'key' )->toArray();
        } );
    }

    return ( is_array( $key ) ) ? \Illuminate\Support\Arr::only( $settings, $key ) : $settings[$key];
}

/**
 * Give me discount of given promo
 *
 * @param \App\Models\Cart $cart
 * @param string           $type       discount type
 * @param integer          $discount
 */
function promoDiscount( $total, $type, $discount ) {
    if ( $type == 'amount' ) {
        return $total -= $discount;
    }

    return ( $discount / 100 ) * $total;
}

/**
 * Give me tax amount
 *
 * @param \App\Models\Cart $cart
 * @param integer          $percentage
 */
function taxCalculator( $total, $percentage ) {
    return ( $percentage / 100 ) * $total;
}

/**
 * @param $cart
 */
function priceCalculator( $cart ) {
    $subtotal = $cart->products->sum( 'price' );

    $discount = 0;

    if ( $cart->promo_id ) {
        $promo    = Promo::find( $cart->promo_id );
        $discount = promoDiscount( $subtotal, $promo->type, $promo->discount );
    }

    $shipping = ShippingService::active()->first();
    $shipping = $shipping ? $shipping->price : 0;
    $tax      = Tax::active()->first();
    $tax      = $tax ? $tax->percentage : 0;
    $adjust   = 0;

    $total = $subtotal - $discount - $adjust + $shipping + taxCalculator( $subtotal, $tax );

    return ['subtotal' => $subtotal, 'discount' => $discount, 'total' => $total, 'adjust' => $adjust];
}

/**
 * Check if the current loggedin user is admin
 * @return  bool
 */
function isAdmin() {
    return auth()->user()->type == 1;
}

/**
 * Check if the current loggedin user is the shop manager
 * 
 * @return  bool
 */
function isShopManager( $store_id ) {
    return auth()->user()->type == 2 && auth()->user()->store_id == $store_id;
}
