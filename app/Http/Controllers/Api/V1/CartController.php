<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Cart;
use App\Models\Promo;
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
     * Apply promo
     * @param Request $request
     */
    public function applyPromo(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);
        
        $cart = auth()->user()->cart;

        if (!$cart) {
            return api()->notFound('Cart not found');
        }

        $promo = Promo::whereCode($request->code)->where('limit', '>', 0)->first();

        if (!$promo) {
            return api()->notFound('Promo not found');
        }
        
        $cart->update(['promo_id' => $promo->id]);

        $total = $cart->products->sum('price');

        $discount = promoDiscount($total, $promo->type, $promo->discount);

        // this code is will execute after order is placed
        // $this->updatePromo($promo);

        return api()->success( 'Promo applied', [
            'discount' => $discount,
        ] );
    }

    /**
     * Update promo
     * @param \App\Models\Promo $promo
     */
    public function updatePromo($promo)
    {
        $promo->update(['limit' => $promo->limit - 1, 'used' => $promo->limit + 1]);
    }
}
