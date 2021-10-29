<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        return ok( 'Products list retrived successfully', Product::all() );
    }

    public function productDetails($id)
    {
        return ok( 'Product details retrived successfully', Product::find($id) );
    }
}
