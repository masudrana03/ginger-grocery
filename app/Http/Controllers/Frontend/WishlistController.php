<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * @param $productId
     */
    public function addToWishlistById( $productId )
    {
        // return $productId;
        $user = auth()->user();

        if( ! $user ){
            return redirect()->route('login');
        }
        $user->savedProducts()->syncWithoutDetaching([$productId]);
        $this->removeToWishlistById();
        return view('frontend.ajax.wishlist-product');

    }

    /**
     * @param $productId
     */
    public function removeToWishlistById( $productId )
    {
        $user = auth()->user();

        if( ! $user ){
            return redirect()->route('login');
        }
        $user->savedProducts()->detach($productId);

        return view('frontend.ajax.wishlist-product');
    }

    /**
     * @param $productId
     */
    public function removeToWishlistByDefaultId( $productId )
    {
        $user = auth()->user();

        if( ! $user ){
            return redirect()->route('login');
        }
        $user->savedProducts()->detach($productId);

        return view('frontend.ajax.wishlist');
    }

    public function index()
    {
        $wishlistProducts = auth()->user()->savedProducts ?? [];
        return view('frontend.wishlist', compact( 'wishlistProducts' ));
    }
}
