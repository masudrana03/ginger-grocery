<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller {

    /**
     * Display a listing of the categories.
     *
     * @return JsonResponse
     */
    public function getCategories() {
        return ok( 'Categories list retrived successfully', Category::all() );
    }

    /**
     * Display the specified category.
     *
     * @param integer $categoryId
     * @return JsonResponse
     */
    public function categoryDetails( $categoryId ) {
        return ok( 'Category details retrived successfully', Category::find( $categoryId ) );
    }
}
