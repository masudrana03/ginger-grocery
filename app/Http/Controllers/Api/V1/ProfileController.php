<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller {

    /**
     * Return json response of loggedin user
     */
    public function getProfile() {
        return ok( 'Profile retrived successfully', auth()->user() );
    }

    /**
     * @param Request $request
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
