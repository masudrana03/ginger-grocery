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


            //  $storeWiseProduct = Store::with(
            //  'products',
            //  'products.store',
            //  'products.currency',
            //  'products.brand',
            //  'products.category',
            //  'products.unit', 'products.types',
            //  'products.images'
            //  )->find( $storeId );

            //  return $store->name  ;
            return $storeWiseProduct;

        return view('frontend.store', compact( 'storeWiseProduct', 'store' ) );
    }


    // public function shop()
    // {
    //      return view('frontend.store');
    // }
    // , 'category', 'unit', 'store', 'currency', 'types', 'images'
}
