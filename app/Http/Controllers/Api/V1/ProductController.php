<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {

        $product = Product::with(
                                'brand',
                                'category',
                                'unit',
                                'user:id,name',
                                'store',
                                'currency',
                                'types',
                                'nutritions',
                                'images'
                                )->get();

        return ok( 'Products list retrived successfully', $product );
    }

    public function productDetails($id)
    {

        $product = Product::with(
                                'brand',
                                'category',
                                'unit',
                                'user:id,name',
                                'store',
                                'currency',
                                'types',
                                'nutritions',
                                'images'
                                )->find($id);

        return ok( 'Product details retrived successfully', $product );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function searchProduct(Request $request)
    {
        $query = Product::query();

        if ($search = $request->input('search'))
        {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($sort_by = $request->input('sort_by'))
        {
            $query->orderBy('price', $sort_by);
        }

        $all_search = $query->get()
                            ->load(
                                  'brand',
                                  'category',
                                  'unit',
                                  'user:id,name',
                                  'store',
                                  'currency',
                                  'types',
                                  'nutritions',
                                  'images');


        return ok( 'Search product successfully', $all_search );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function filterProduct(Request $request)
    {

        $productQuery = Product::with('brand',
                                      'category',
                                      'unit',
                                      'user:id,name',
                                      'store',
                                      'currency',
                                      'types',
                                      'nutritions',
                                      'images');


        if ($request->calories)
        {
            $productQuery->where('calories_per_serving', 'LIKE', '%'.$request->calories.'%');
        }

        if ($request->fat_calories)
        {
            $productQuery->orWhere('fat_calories_per_serving', 'LIKE', '%'.$request->fat_calories.'%');
        }

        if ($request->low_price)
        {
            $productQuery->where('price','>=', $request->low_price);
        }

        if ($request->high_price)
        {
            $productQuery->where('price','<=', $request->high_price);
        }

        if ($request->categories)
        {
            $productQuery->orWhereHas('category', function($query) use ($request) {
                $query->where('name', $request->categories);
            });
        }

        if ($request->brands)
        {
            $productQuery->orWhereHas('brand', function($query) use ($request) {
                $query->where('name', $request->brands);
            });
        }

        if ($request->types)
        {
            $productQuery->orWhereHas('types', function($query) use ($request) {
                $query->where('name', $request->types);
            });
        }

        if ($request->nutritions)
        {
            $productQuery->orWhereHas('nutritions', function($query) use ($request) {
                $query->where('name', $request->nutritions);
            });
        }

        $filter =  $productQuery->get();

        return ok( 'product filter successfully', $filter );
    }
}
