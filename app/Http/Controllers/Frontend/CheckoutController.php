<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];
        return view('frontend.checkout', compact('compareProduct'));
    }
}
