<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\CallToAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * @param $id
     */
    public function compareProduct($id)
    {
        //return session()->flush();

        if (!session('compare')) {
            session()->put('compare', [$id]);
            return back();
        }

        $compare = session('compare');

        if (count($compare) >= 3) {
            unset($compare[0]);
        }

        session()->push('compare', $id);

        return back();
    }
}
