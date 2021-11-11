<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\OrderRating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderRatingController extends Controller
{
    /**
     * Add order rating
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function addOrderRating(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required',
            'order_id' => 'required'
        ]);

        $OrderRating = OrderRating::whereOrderId($request->order_id)->first();

        if ($OrderRating) {
            return api()->error( 'Your feedback already taken');
        }

        OrderRating::create($request->all());

        return api()->success( 'Thank You! Your feedback has been successfully submit');
    }
}
