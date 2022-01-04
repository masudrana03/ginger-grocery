<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function vendors()
    {
        $stores = Store::with('products')->get();

        return view('frontend.vendor', compact('stores'));
    }

    public function vendorDetails(Request $request, $id )
    {
        $store = Store::with('products')->findOrFail($id);

        $vendorWise = $store->products();

        if ($request->query('search')) {
            $vendorWise = $store->products()->where('name', $request->query('search'));
        }

        $vendorWise = $vendorWise->paginate(15);

        // return $vendorWise;
       // $store = Store::with('products')->where('');
        // $store = Store::where( $id ,'id')->with('products')->get();
        // $store = Store::find($id);

        // return  $store ;
        // $storeWiseProduct = Product::with( 'store', 'currency', 'category.products', 'brand', 'unit' )->where( 'id' ,$id)->paginate(15);
        // return $storeWiseProduct;

        return view('frontend.vendor-details', compact('store', 'vendorWise'));
    }
}
