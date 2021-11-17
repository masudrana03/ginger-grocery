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
}
