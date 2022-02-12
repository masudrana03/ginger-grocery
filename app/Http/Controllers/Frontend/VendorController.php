<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Store;
use App\Models\Nutrition;
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
     * Find product by name & flitter by low_to_high, high_to_low, release
     *
     * @param $productId as $id
     * @param $request
     */
    public function vendorDetails(Request $request, $slug)
    {
        // return $request;

        $price = str_replace("$", "", $request->price);
        $q = explode("-", $price);

        $nutritions = Nutrition::all();
        $brands = Brand::all();

        $defaultPaginate = 15;

        $store = Store::with('products')->whereSlug($slug)->firstOrFail();

        $vendorWise = $store->products();

        if ($request->price) {
            $vendorWise = $store->products()->where('price', '>=', $q[0])->where('price', '<=', $q[1]);
        }

        if ($request->brand) {
            $vendorWise = $store->products()->where('brand_id', $request->brand);
        }

        if ($request->nutrition) {
            $vendorWise = $store->products()->whereHas('nutritions', function ($query) use ($request) {
                $query->where('nutrition_id', $request->nutrition);
            });
        }

        if ($request->query('search')) {
            $vendorWise = $store->products()->where('name', $request->query('search'));
        }

        if ($request->query('sort') == 'low_to_high') {
            $vendorWise = $store->products()->orderBy('price');
        }

        if ($request->query('sort') == 'high_to_low') {
            $vendorWise = $store->products()->orderByDesc('price');
        }

        if ($request->query('sort') == 'release') {
            $vendorWise = $store->products()->orderByDesc('id');
        }

        if ($request->query('numeric_sort')) {
            $defaultPaginate = $request->query('numeric_sort');
        }

        if ($request->query('numeric_sort') == 'all') {
            $defaultPaginate = count($store->products);
        }

        $vendorWise = $vendorWise->paginate($defaultPaginate);

        return view('frontend.vendor-details', compact('store', 'vendorWise', 'brands', 'nutritions'));
    }

    public function ajaxSort()
    {
        
    }
}
