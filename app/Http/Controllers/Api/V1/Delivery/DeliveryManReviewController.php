<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryManReview;
use App\Models\User;
use Illuminate\Http\Request;

class DeliveryManReviewController extends Controller
{
    /**
     * Add order rating
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function addDeliveryManRating(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'rating'  => 'required'
        ]);

        $user = User::find($request->user_id);

        if (! $user) {
            return api()->notFound( 'User is not available');
        }

        $DeliveryManRating = DeliveryManReview::whereUserId($user->id)->first();

        if ($DeliveryManRating) {
            return api()->error( 'Your feedback already taken');
        }

        $DeliveryManRating = DeliveryManReview::create($request->all());

        return api()->success( 'Thank You! Your feedback has been successfully submit', $DeliveryManRating);

    }
}
