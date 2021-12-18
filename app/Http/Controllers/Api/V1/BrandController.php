<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return JsonResponse
     */
    public function getBrands() {
        return ok( 'Brands list retrieved successfully', Brand::all() );
    }

    /**
     * Display the specified brand.
     *
     * @param integer $brandId
     * @return JsonResponse
     */
    public function brandDetails( $brandId ) {
        return ok( 'Brand details retrieved successfully', Brand::find( $brandId ) );
    }
}
