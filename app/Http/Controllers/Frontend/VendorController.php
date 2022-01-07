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
        $stores = Store::with('products')->paginate(12);

        return view('frontend.vendor', compact('stores'));
    }

    /**
     * Find product by name
     *
     * @param $productId as $id
     * @param $request
     */
    public function vendorDetails(Request $request, $id )
    {
        // return 'bnhbk';
        $store = Store::with('products')->findOrFail($id);

        $vendorWise = $store->products();

        if ($request->query('search')) {
            $vendorWise = $store->products()->where('name', $request->query('search'));
        }

        if ( $request->query('sort') == 'low_to_high' ) {
            $vendorWise = $store->products()->orderBy('price');
        }

        if ( $request->query('sort') == 'high_to_low' ) {
            $vendorWise = $store->products()->orderByDesc('price');
        }

        if ( $request->query('sort') == 'release' ) {
            $vendorWise = $store->products()->orderByDesc('id');
        }


        $vendorWise = $vendorWise->paginate(15);

        return view('frontend.vendor-details', compact('store', 'vendorWise'));
    }
}
