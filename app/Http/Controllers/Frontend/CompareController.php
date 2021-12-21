<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function compare()
    {
        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];
        if($productIds < 1 ){
            $compareProduct = Product::find($productIds) ?? [] ;
            return back();
        }
        return view('frontend.compare' , compact( 'compareProduct' ) );
    }


    /**
     * @param $id
     */
    public function compareProduct($id)
    {
        // return time() - session('start_time');
        if (! session('start_time')) {
            session()->put('start_time', time());
        } else if (time() - session('start_time') > 1800) {
            session()->flush();
        }

        // session()->put('start_time', time());

        // if (time() - session('start_time') < 10) {
        //     session()->flush();
        // }

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
