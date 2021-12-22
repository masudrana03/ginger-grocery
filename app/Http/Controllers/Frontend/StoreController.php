<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * @param $storeId
    */
    public function storeById( $storeId )
    {
        $store = Store::findOrFail($storeId);

        $storeWiseProduct = Product::with( 'store', 'currency', 'category.products', 'brand', 'unit' )->where( 'store_id' ,$store->id )->paginate(15);

        return view('frontend.store', compact( 'storeWiseProduct', 'store' ) );
    }

}
