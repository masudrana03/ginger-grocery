<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Store;
use App\Models\Nutrition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function vendorIndex(Request $request)
    {
        // $defaultPaginate = 5;

        // $store = Store::with('products')->get();

        // $vendorWise = $store->products();

        // if ($request->query('sort') == 'low_to_high') {
        //     $vendorWise = $store->products()->orderBy('price');
        // }

        // if ($request->query('sort') == 'high_to_low') {
        //     $vendorWise = $store->products()->orderByDesc('price');
        // }

        // if ($request->query('sort') == 'release') {
        //     $vendorWise = $store->products()->orderByDesc('id');
        // }

        // if ($request->query('numeric_sort')) {
        //     $defaultPaginate = $request->query('numeric_sort');
        // }

        // if ($request->query('numeric_sort') == 'all') {
        //     $defaultPaginate = count($store->products);
        // }

        // $vendorWise = $vendorWise->paginate($defaultPaginate);

        if ($request->ajax()) {
            return $request;
            // return view('frontend.vendor', compact('stores'));
        }

        $stores = Store::with('products')->paginate(2);

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

        $defaultPaginate = 5;

        $store = Store::with('products')->whereSlug($slug)->firstOrFail();

        $storeBrands = $store->products->pluck('brand_id')->unique();
        $brands = Brand::find($storeBrands);

        // return  $store->products()->each(function ($product) {
        //     $product->where('nutrition_product.product_id', '=', 'products.id');
        // })->get();

        // return  $store->with(['products', 'products.nutritions' => function ($query) {
        //     $query->where('products.id', '=', 'nutrition_product.product_id');
        // }])->get();

       // $nutritions = $store->with('products.nutritions')->get();
        // return $nutritions;


        //return $storeBrands;


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

        if ($request->ajax()) {
            // return $request;
            return view('frontend.ajax.vendor-sort', compact('store', 'vendorWise', 'brands', 'nutritions'));
        }

        return view('frontend.vendor-details', compact('store', 'vendorWise', 'brands', 'nutritions'));
    }

}
