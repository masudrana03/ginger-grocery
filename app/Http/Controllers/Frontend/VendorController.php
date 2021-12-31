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

    public function vendorDetails()
    {
        return view('frontend.vendor-details');
    }
}
