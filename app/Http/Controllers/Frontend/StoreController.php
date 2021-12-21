<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    /**
     * @param $storeId
    */
    public function storeById( $storeId )
    {
        $storeWiseProduct = Product::with(  'brand', 'category', 'unit', 'store', 'currency', 'types', 'images' )->where( 'store_id', $storeId )->get();

        return view('frontend.store', compact('storeWiseProduct'));
    }


    // public function shop()
    // {
    //      return view('frontend.store');
    // }
}
