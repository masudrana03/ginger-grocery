<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;

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
        }

        $cart = Cart::where('user_id', auth()->id())->first();

        if (!$cart) {
            $cart          = new Cart();
            $cart->user_id = auth()->id();
            $cart->save();
        }

        $cart->products()->sync([
            $product->id => [
                'quantity' => $request->quantity,
                'options'  => $request->options ? json_encode($request->options) : null,
            ],
        ], false);

        return back()->with('success', 'Product added to cart');
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
        $carts = auth()->user()->cart->products->groupBy('store_id');

        $totalTax = 0;

        foreach ($carts as $cart) {
            $totalTax += $calculatedPrice = priceCalculator($cart)['tax'];
        }

        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];
        return view('frontend.cart', compact('compareProduct', 'totalTax'));
    }

    /**
     * @param $id
     */
    public function removeToCartById($id)
    {
        $product = Product::find($id);

        $product->carts()->detach();

        return back()->with('success', 'Product removed from cart');
    }

    public function cartUpdate(Request $request)
    {
        foreach ($request->productids as $key => $item) {
            auth()->user()->cart->products()->sync([
                $item => [
                    'quantity' => $request->qty[$key],
                    'options'  => $request->options ? json_encode($request->options) : null,
                ],
            ], false);
        }

        return back()->with('success', 'Product updated to cart');
    }
}
