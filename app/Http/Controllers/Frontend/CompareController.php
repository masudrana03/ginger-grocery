<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\CallToAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CompareController extends Controller
{
    public function compare()
    {
        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];
        if ($productIds < 1) {
            $compareProduct = Product::find($productIds) ?? [];
            return back();
        }
        $callToActions = CallToAction::all();
        return view('frontend.compare', compact('compareProduct', 'callToActions'));
    }

    /**
     * Store compare product
     * 
     * @param $id
     */
    public function compareProduct($id)
    {
        $compareProducts = Cache::get('products');

        if (! $compareProducts) {
            Cache::put('products', [$id], 120);
            return Cache::get('products');
        }

        if (in_array($id, $compareProducts)) {
            return Cache::get('products');
        }
    
        if (count($compareProducts) >= 3) {
            array_shift($compareProducts);
            array_push($compareProducts, $id);
            Cache::put('products', $compareProducts, 30);
            return Cache::get('products');
        }

        array_push($compareProducts, $id);
        Cache::put('products', $compareProducts, 30);
        //return Cache::get('products');
        
        return response()->json(['success' => 'Product added to compare list.']);

        //return session()->flush();

        // if (!session('compare')) {
        //     session()->put('compare', [$id]);
        //     return back();
        // }

        // $compare = session('compare');

        // if (count($compare) >= 3) {
        //     unset($compare[0]);
        // }

        // session()->push('compare', $id);

        // return back();
    }
}
