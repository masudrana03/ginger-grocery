<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * @param $request
     */
    public function addToCart( Request $request ) {
        $request->validate( [
            'product_id' => 'required',
            'quantity'   => 'required',
        ] );

        $product = Product::find( $request->product_id );

        if ( !$product ) {
            return back()->with( 'error', 'Product not found' );
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
        ], false );

        return back()->with( 'success', 'Product added to cart' );
    }

    /**
     * @param $id
     */
    public function addToCartById( $id ) {
        $request = new Request([
            'product_id' => $id,
            'quantity'   => 1,
        ]);

        return $this->addToCart( $request );
    }

    public function cart()
    {
        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];
        return view('frontend.cart', compact( 'compareProduct' ) );
    }

    public function cartUpdate(Request $request)
    {
       return $request;
    }
}
