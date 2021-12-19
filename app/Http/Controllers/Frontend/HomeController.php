<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::with('products.store', 'products.currency')->limit(12)->get();

        return view('frontend.index', compact('categories'));
    }

    public function productDetails($id)
    {
        $product = Product::with('store', 'currency', 'category.products', 'brand', 'unit')->findOrFail($id);
        return view('frontend.product-details', compact('product'));
    }

    public function categoryDetails($id)
    {
        $category = Category::with('products.store', 'products.currency')->findOrFail($id);
        return view('frontend.category', compact('category'));
    }
}
