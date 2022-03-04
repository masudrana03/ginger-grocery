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
            $cart = Cart::where('user_id', auth()->id())->first();;

            if (!$cart) {
                $cart          = new Cart();
                $cart->user_id = auth()->id();
                $cart->save();

                $cart->products()->sync([
                    $product->id => [
                        'quantity' => $request->quantity,
                        'options'  => $request->options ? json_encode($request->options) : null,
                    ],
                ], false);

                return view("frontend.ajax.cart");
            } else {

                $cartId = auth()->user()->cart->id;
                $product_id = $request->product_id;
                $quantity = $request->quantity;

                $searching_product = DB::table('cart_product')->whereCartId($cartId)->whereProductId($product_id)->first();

                if ($searching_product) {
                    $current_qty = $searching_product->quantity;
                    $update_qty = $current_qty + $quantity;
                    //return $current_qty;
                    if ($current_qty <= 9) {
                        $product = DB::table('cart_product')->whereCartId($cartId)->whereProductId($product_id)->update(['quantity' => $update_qty]);
                        return view("frontend.ajax.cart");
                    } else {
                        return view("frontend.ajax.cart");
                    }
                } else {
                    $cart->products()->sync([
                        $product->id => [
                            'quantity' => $request->quantity,
                            'options'  => $request->options ? json_encode($request->options) : null,
                        ],
                    ], false);

                    return view("frontend.ajax.cart");
                }
            }
        }
    }


    /**
     * @param $id
     */
    public function addToCartById($id)
    {
        $request = new Request([
            'product_id' => $id,
            'quantity'   => 1,
        ]);

        return $this->addToCart($request);
    }

    public function cart()
    {
        $carts = auth()->user()->cart ? auth()->user()->cart->products->groupBy('store_id') : [];

        $totalTax = 0;

        foreach ($carts as $cart) {
            $totalTax += priceCalculator($cart)['tax'];
        }

        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];
        return view('frontend.cart', compact('compareProduct', 'totalTax'));
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
        //$product = Product::find($id);
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
        $totalTax = 0;

        foreach ($carts as $cart) {
            $totalTax += priceCalculator($cart)['tax'];
        }

        return view('frontend.ajax.update-cart-div', compact('totalTax'));
    }
}
