<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\OrderRating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

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

        $order = Order::find($request->order_id);

        if (! $order) {
            return api()->notFound( 'Order is not found');
        }

        $OrderRating = OrderRating::whereOrderId($order->id)->first();

        if ($OrderRating) {
            return api()->error( 'Your feedback already taken');
        }

        $OrderRating = OrderRating::create($request->all());

        return api()->success( 'Thank You! Your feedback has been successfully submit', $OrderRating);
    }
}
