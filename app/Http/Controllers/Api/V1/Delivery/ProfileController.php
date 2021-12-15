<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryManDetails;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Return json response of loggedin user.
     *
     * @return JsonResponse
     */
    public function getProfile() {
        return ok( 'Profile retrieved successfully', auth()->user() );
    }

    /**
     *  Return json response of update user profile.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateProfile( Request $request )
    {
        $validation = validateData( [
            'name' => 'required',
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }

        $user = auth()->user()->updateProfile( $request );

        return ok( 'Profile updated successfully', $user );
    }


    /**
     * Return response Delivery Boy Online Status
     *
     * @param integer $userId
     * @return JsonResponse
     */
    public function getStatus( $userId )
    {
        $deliveryMan = DeliveryManDetails::where('user_id', $userId )->first();

        $deliveryMan->update([
            'online_status' => $deliveryMan->online_status == 'Online' ? 'Offline' : 'Online'
        ]);

        return ok( 'Status updated successfully', $deliveryMan->online_status );
    }
}
