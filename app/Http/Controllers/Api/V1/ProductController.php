<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the Product with there relational data.
     *
     * @return JsonResponse
     */
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

        return ok( 'Products list retrieved successfully', $product );
    }

    /**
     * Display the specified Product with there relational data.
     *
     * @param integer $productId
     * @return JsonResponse
     */
    public function productDetails($productId)
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
                                )->find($productId);

        return ok( 'Product details retrieved successfully', $product );
    }

    /**
     * User search the product.
     *
     * @param Request $request
     * @return JsonResponse
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

        $allSearch = $query->get()
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

        return ok( 'Search product successfully', $allSearch );
    }

    /**
     * User filter there product by calories, price, categories, brands, types, nutritions.
     *
     * @param Request $request
     * @return JsonResponse
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


        if ( $request->calories )
        {
            $productQuery->where('calories_per_serving', 'LIKE', '%'.$request->calories.'%');
        }

        if ( $request->fat_calories )
        {
            $productQuery->orWhere('fat_calories_per_serving', 'LIKE', '%'.$request->fat_calories.'%');
        }

        if ( $request->low_price )
        {
            $productQuery->where('price','>=', $request->low_price);
        }

        if ( $request->high_price )
        {
            $productQuery->where('price','<=', $request->high_price);
        }

        if ( $request->categories )
        {
            $categories = explode(",", $request->categories);
            $productQuery->orWhereHas('category', function($query) use ($categories) {
                $query->where('name', $categories);
            });
        }

        if ( $request->brands )
        {
            $brands = explode(",", $request->brands );
            $productQuery->orWhereHas('brand', function( $query ) use ( $brands ) {
                $query->whereIn('name', $brands );
            });
        }

        if ( $request->types )
        {
            $productQuery->orWhereHas('types', function( $query ) use ( $request ) {
                $query->where('name', $request->types );
            });
        }

        if ( $request->nutritions )
        {
            $productQuery->orWhereHas('nutritions', function( $query ) use ($request) {
                $query->where('name', $request->nutritions);
            });
        }

        $filter =  $productQuery->get();

        if ( !$filter ) {
            return ok('No product found');
        }

        return ok( 'Product filter successfully', $filter );
    }
}
