<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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

        if($search = $request->input('search')){
            $query->where('name', 'LIKE', "%{$search}%");
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


        return ok( 'Search product details successfully', $allSearch);
    }

}
