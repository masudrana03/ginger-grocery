<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function compare()
    {
        $productId = session('compare');
        $compareProduct = Product::find($productId) ?? [] ;
        return view('frontend.compare' , compact( 'compareProduct' ) );
    }


    /**
     * @param $id
     */
    public function compareProduct($id)
    {
        // return session()->flush();

        if (! session('compare')) {
            session()->put('compare', [$id]);
            // return session('compare');
            return back();
        }

        $compare = session('compare');

        if( $compare >= 3)
        {
            unset($compare[0]);
            session()->push('compare', $id);
        }

        // return session('compare');
        return back();
    }
}
