<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller {

    /**
     * Display a listing of the categories.
     */
    public function getCategories() {
        return ok( 'Categories list retrived successfully', Category::all() );
    }

    /**
     * Display the specified category.
     */
    public function categoryDetails($id) {
        return ok( 'Category details retrived successfully', Category::find($id) );
    }
}
