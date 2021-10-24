<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function getBrands() {
        return ok( 'Brands list retrived successfully', Brand::all() );
    }

    /**
     * Display the specified brand.
     */
    public function brandDetails($id) {
        return ok( 'Brand details retrived successfully', Brand::find($id) );
    }
}
