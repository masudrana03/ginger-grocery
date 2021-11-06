<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller {

    /**
     * get cart
     * return cart
     */
    public function getCart() {
        $cart = auth()->user()->cart ?: new Cart();
        return ok( 'Cart retrived successfully', $cart );
    }

    /**
     * add product to cart
     * @param Request $request
     */
    public function addToCart( Request $request ) {
        $request->validate( [
            'product_id' => 'required',
            'quantity'   => 'required',
        ] );

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

        return api()->success( 'Product added to cart', [
            'cart' => $cart->load( 'products' ),
        ] );
    }

    /**
     * Add multiple products to cart
     * @param Request $request
     */
    public function addToCartMultipleProduct( Request $request ) {
        $request->validate( [
            'products'              => 'required|array',
            'products.*.product_id' => 'required',
            'products.*.quantity'   => 'required',
        ] );

        $products = $request->products;

        $cart = Cart::where( 'user_id', auth()->id() )->first();

        foreach ( $products as $product ) {
            $newRequest = new Request( [
                'product_id' => $product['product_id'],
                'quantity'   => $product['quantity'],
            ] );
            $this->addToCart( $newRequest );
        }

        return api()->success( 'Product added to cart', [
            'cart' => $cart,
        ] );

    }

    /**
     * Display a listing of the  Cart Details.
     * @param  $id
     */
    public function getCartProduct($id){
        $cartsProduct = Cart::with('products')->find($id);

        return ok('Cart Product list retrive successfully', $cartsProduct);
    }
}
