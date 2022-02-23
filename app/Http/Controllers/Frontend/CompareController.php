<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\CallToAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class CompareController extends Controller
{
    public function compare()
    {
        $compareProducts = Cache::get('compareProducts');
        $compareProducts = Product::find($compareProducts) ?? [];

        if (count($compareProducts) <= 1) {
            return back()->with('error', 'No products to compare');
        }

        return view('frontend.compare', compact('compareProducts'));
    }

    /**
     * Store compare product
     * 
     * @param $id
     */
    public function compareProduct($id)
    {
        $compareProducts = Cache::get('compareProducts');

        if (! $compareProducts) {
            Cache::put('compareProducts', [$id], 1800);
            // return Cache::get('compareProducts');
            return view('frontend.ajax.compare');
        }

        if (in_array($id, $compareProducts)) {
            // return Cache::get('compareProducts');
            return view('frontend.ajax.compare');
        }
    
        if (count($compareProducts) >= 3) {
            array_shift($compareProducts);
            array_push($compareProducts, $id);
            Cache::put('compareProducts', $compareProducts, 1800);
            // return Cache::get('compareProducts');
            return view('frontend.ajax.compare');
        }

        array_push($compareProducts, $id);
        Cache::put('compareProducts', $compareProducts, 1800);
        
        return view('frontend.ajax.compare');
    }

    /**
     * remove compare product
     * 
     * @param $id
     */
    public function removeCompareProduct($id)
    {
        $compareProducts = Cache::get('compareProducts');

        $compareProducts = array_diff($compareProducts, [$id]);

        Cache::put('compareProducts', $compareProducts, 1800);

        return view('frontend.ajax.compare');
    }  

    /**
     * remove compare product from compare page
     * 
     * @param $id
     */
    public function removeCompareProduct2()
    {
        $compareProducts = Cache::get('compareProducts');
        $compareProducts = Product::find($compareProducts) ?? [];

        if (count($compareProducts) <= 1) {
            session()->flash('error', 'No products to compare');
            return false;
        }

        return view('frontend.ajax.compare-products', compact('compareProducts'));
    }
}
