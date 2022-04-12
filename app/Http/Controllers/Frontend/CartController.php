<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * @param $request
     */

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity'   => 'required',
        ]);
        $product = Product::find($request->product_id);

        if (!$product) {
            return back()->with('error', 'Product not found');
        } else {
            $cart = Cart::where('user_id', auth()->id())->first();

            if (!$cart) {
                $cart          = new Cart();
                $cart->user_id = auth()->id();
                $cart->save();

                $cart->products()->sync([
                    $product->id => [
                        'quantity' => 1,
                        'options'  => $request->options ? json_encode($request->options) : null,
                    ],
                ], false);

                return view("frontend.ajax.chaldal-cart");
            } else {

                $cartId = auth()->user()->cart->id;
                $product_id = $request->product_id;
                $quantity = request('quantity');

                $searching_product = DB::table('cart_product')->whereCartId($cartId)->whereProductId($product_id)->first();

                if ($searching_product) {
                    $quantity = request('quantity');
                    $current_qty = $searching_product->quantity;
                    $update_qty = $current_qty + $quantity;
                    //return $current_qty;
                    if ($update_qty <= 10) {
                        $product = DB::table('cart_product')->whereCartId($cartId)->whereProductId($product_id)->update(['quantity' => $update_qty]);
                        return view("frontend.ajax.chaldal-cart");
                    } else {
                        return view("frontend.ajax.chaldal-cart");
                    }
                } else {
                    $cart->products()->sync([
                        $product->id => [
                            'quantity' => $request->quantity,
                            'options'  => $request->options ? json_encode($request->options) : null,
                        ],
                    ], false);

                    return view("frontend.ajax.chaldal-cart");
                }
            }
        }
    }


    /**
     * @param $id
     */
    public function addToCartById($id)
    {
        if (request('quantity')) {
            $request = new Request([
                'product_id' => $id,
                'quantity'   => request('quantity'),
            ]);
        }
        //else {
        //     $request = new Request([
        //         'product_id' => $id,
        //         'quantity'   => 1,
        //     ]);
        // }


        return $this->addToCart($request);
    }

    public function cart(Request $request)
    {
        $carts = auth()->user()->cart ? auth()->user()->cart->products->groupBy('store_id') : [];

        $subtotal = 0;

        foreach ($carts as $cart) {
            $subtotal += priceCalculator($cart)['subtotal'];
        }

        $tax = taxCalculator($subtotal);

        $cart = request()->segment(1);
        // dd($cart);

        // $cart = request()->segment(1);
        return view('frontend.cart', compact('subtotal', 'tax','cart'));
    }

    public function cartUpdate(Request $request)
    {
        $cartId = auth()->user()->cart->id;
        $product_id = request('id');
        $quantity = request('quantity');
        if ($quantity <= 10 || $quantity >= 1) {
            $product = DB::table('cart_product')->whereCartId($cartId)->whereProductId($product_id)->update(['quantity' => $quantity]);
        }
    }

    /**
     * @param $id
     */

    public function ajaxUpdateCart($id)
    {
        return view('frontend.ajax.cart');
    }

    /**
     * @param $id
     */

    public function removeToCartById($id)
    {
        $pro_id = $id;
        $product = Product::find($pro_id);
        $product->carts()->detach();

        return view('frontend.ajax.cart');
    }

    /**
     * @param $id
     */


    public function removeItemFromDiv(Request $request, $id)
    {

        $carts = auth()->user()->cart ? auth()->user()->cart->products->groupBy('store_id') : [];
        $subtotal = 0;

        foreach ($carts as $cart) {
            $subtotal += priceCalculator($cart)['subtotal'];
        }

        $tax = taxCalculator($subtotal);


        return view('frontend.ajax.update-cart-div', compact('subtotal', 'tax'));
    }
}
