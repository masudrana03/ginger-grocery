<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller {

    /**
     * Return json response of logged user
     *
     * @return JsonResponse
     */
    public function getProfile()
    {
        return ok( 'Profile retrieved successfully', auth()->user() );
    }

    /**
     * Update of user profile.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateProfile( Request $request ) {

        $validation = validateData( [
            'name' => 'required',
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }

        $user = auth()->user()->updateProfile( $request );

        return ok( 'Profile updated successfully', $user );
    }
}
