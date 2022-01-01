<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function vendors()
    {
        $stores = Store::with('products')->get();

        return view('frontend.vendor', compact('stores'));
    }

    public function vendorDetails( $id )
    {
        $store = Store::with('products')->find($id);
        // $store = Store::where( $id ,'id')->with('products')->get();
        // $store = Store::find($id);

        // return  $store ;

        return view('frontend.vendor-details', compact('store'));
    }
}
