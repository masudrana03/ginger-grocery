<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    /**
     * Register a user via API
     * @param Request $request
     */
    public function register( Request $request ) {
        $request->validate( [
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
        ] );

        $user           = new User();
        $user->email    = $request->email;
        $user->password = Hash::make( $request->password );
        $user->save();

        $token = $user->createToken('Bearer');

        $data = [
            'token_type' => 'Bearer',
            'token' => $token->plainTextToken,
        ];

        return ok( 'User auth token generated successfully', $data );
    }
}
