<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Store;
use App\Models\Product;
use App\Models\Nutrition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function vendorIndex(Request $request)
    {
        $defaultPaginate = 5;
        $vendorWise = '';

        $allStore = Store::query();

        if ($request->query('sort') == 'total_items') {
            $vendorWise = $allStore->withCount('products')->orderBy('products_count', 'desc');
        }

        if ($request->query('sort') == 'avg_rating') {
            $vendorWise = $allStore->withCount('productRating')->orderBy('product_rating_count', 'desc');
        }

        if ($request->query('numeric_sort')) {
            $defaultPaginate = $request->query('numeric_sort');
        }

        if ($request->query('numeric_sort') == 'all') {
            $defaultPaginate = count($allStore->get('id'));
        }

        if ($request->query('name')) {
            $vendorWise = $allStore->where('name', 'like', '%' . $request->query('name') . '%', );
        }

        // return $defaultPaginate;

        $stores = $allStore->paginate($defaultPaginate);

        if ($request->ajax()) {
            // return $request->name;
            // if ($request->name) {
            //     return view('frontend.ajax.vendor-store-sort', compact('stores'));
            // }
            return view('frontend.ajax.vendor-store-sort', compact('stores'));
        }

        // $stores = Store::with('products')->paginate(2);

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

        $defaultPaginate = 5;
        $price = str_replace("$", "", $request->price);
        $q = explode("-", $price);

        $store = Store::with('products')->whereSlug($slug)->firstOrFail();

        $nutritions = Nutrition::withCount('products')->whereHas('products', function ($product) use ($store) {
            $product->where('store_id', $store->id);
        })->get();

        // return $nutritions;


        $storeBrands = $store->products->pluck('brand_id')->unique();
        $brands = Brand::find($storeBrands);

        $vendorWise = $store->products();

        if ($request->price) {
            $vendorWise = $store->products()->where('price', '>=', $q[0])->where('price', '<=', $q[1]);
        }

        if ($request->brand) {
            $vendorWise = $store->products()->where('brand_id', $request->brand);
        }

        // if ($request->nutrition) {
        //     $vendorWise = Nutrition::with('products')->whereHas('products', function ($product) use ($store) {
        //         $product->where('store_id', $store->id);
        //     });

        //     // return $vendorWise;
        // }

        if ($request->nutrition) {
            $vendorWise = Product::whereHas('nutritions', function ($nutrition) use ($store, $request) {
                $nutrition->where('store_id', $store->id)->whereIn('nutrition_id', $request->nutrition);
            });

            // return $vendorWise;
        }

        // if ($request->nutrition) {
        //     $vendorWise = $store->products()->whereHas('nutritions', function ($query) use ($request) {
        //         $query->where('nutrition_id', $request->nutrition);
        //     });

        //     return $vendorWise;
        // }

        if ($request->query('name')) {
            $vendorWise = $store->products()->where('name', 'like', '%' . $request->query('name') . '%');

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
        // return $vendorWise;

        if ($request->ajax()) {
            // return $request->name;
            return view('frontend.ajax.vendor-product-sort', compact('store', 'vendorWise', 'brands', 'nutritions'));
        }

        return view('frontend.vendor-details', compact('store', 'vendorWise', 'brands', 'nutritions'));
    }
}
