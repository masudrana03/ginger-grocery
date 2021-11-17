<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class BuyNowController extends Controller
{

    /**
     * add product to cart
     * @param Request $request
     */
    public function buyNow(Request $request){

        $request->validate( [
            'product_id' => 'required',
            'quantity'   => 'required',
            ] );

        $cart = auth()->user()->cart ?: new Cart();
        $product = Product::find( $request->product_id );

        if ( !$product ) {
            return api()->notFound( 'Product not found' );
        }

        $cart = Cart::where( 'user_id', auth()->id() )->first();

        if ( !$cart ) {
            $cart          = new Cart();
            $cart->user_id = auth()->id();
            $cart->save();
        }

        $cart->products()->sync( [
            $product->id => [
                'quantity' => $request->quantity,
                'options'  => $request->options ? json_encode( $request->options ) : null,
            ],
        ]
        );

        $allCart = $cart->load(
                     'user:id,name',
                     'promo',
                     'products',
                     'products.currency',
                     'products.category',
                     'products.brand',
                     'products.unit',
                     'products.nutritions',
                     'products.images'
                    );

        return ok('Product added successfully', $allCart);

    }
}
