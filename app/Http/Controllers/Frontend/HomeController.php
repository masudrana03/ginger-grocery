<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Zone;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\CallToAction;
use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    /**
     *
     *
     * @param $request
     */
    public function index(Request $request)
    {
        if (env('APP_NAME') == '') {
            return view('start');
        }
        
        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];

        if ($request->zone_id) {
            $categoryProducts = Category::with(['products.currency', 'products.store' => function ($q) use ($request) {
                $q->find($request->zone_id);
            }])->limit(10)->get();
        } else {
            $categoryProducts = Category::with('products.store', 'products.currency')->limit(10)->get();

        }


        $sliders = Banner::where('status', 1)->get() ?? [];
        $callToActions = CallToAction::all();
        $zones = Zone::all() ?? [];

        return view('frontend.index', compact('categoryProducts', 'compareProduct', 'sliders', 'callToActions', 'zones',));
    }

    public function ajax(Request $request){
        $query = request('search');
        $category_id = request('category_id') ?? null;
        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];

        if ($request->zone_id) {
            $categoryProducts = Category::with(['products.currency', 'products.store' => function ($q) use ($request) {
                $q->find($request->zone_id);
            }]);
        } else {
            $categoryProducts = Category::with('products.store', 'products.currency');
        }

        $categoryProducts = $categoryProducts->whereHas('products', function ($q) use ($query, $category_id) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('excerpt', 'like', '%' . $query . '%');
            })
            ->when($category_id, function ($q) use ($category_id) {
                return $q->where('id', $category_id);
            })
            ->limit(10)->get();


        $sliders = Banner::where('status', 1)->get() ?? [];
        $callToActions = CallToAction::all();
        $zones = Zone::all() ?? [];
        $search = true;
        return view('frontend.home.home', compact('categoryProducts', 'compareProduct', 'sliders', 'callToActions', 'zones', 'search'));
    }

    /**
     *
     *
     * @param $id
     */
    public function productDetails($slug)
    {
        $productsRating = ProductRating::all();

        $product = Product::with('store', 'currency', 'category.products', 'brand', 'unit')->whereSlug($slug)->firstOrFail();
        return view('frontend.product-details', compact('product','productsRating'));
    }

    public function productRating(Request $request, $id)
    {
        //   return  $request;
        $request->validate([
            'rating'     => 'required',
        ]);

        $product = $request->all();

        $productRating = ProductRating::where('user_id', auth()->id())->where('product_id', $id)->first();

        if ( !auth()->id() ) {
            return back()->with('error', 'Please log in first.');
        }

        if ($productRating) {
            return back()->with('error', 'You already product rated this product.');
        }


        $product['user_id'] = auth()->id();
        $product['product_id'] = $id;

        ProductRating::create($product);

        return back()->with('success', 'Product rating and commented successfully');
    }

    /**
     *
     * @param $id
     */
    public function categoryDetails($slug)
    {
        $category = Category::with('products.store', 'products.currency')->whereSlug($slug)->firstOrFail();
        return view('frontend.category', compact('category'));
    }

    public function search()
    {
        $query = request('search');
        $category_id = request('category_id');

        $products = Product::with('store', 'currency', 'category.products', 'brand', 'unit')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('excerpt', 'like', '%' . $query . '%')
            ->orWhere('category_id', $category_id)
            ->get();

        return view('frontend.search', compact('products', 'query'));
    }
}
