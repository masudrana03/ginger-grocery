<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller {
    /**
     * login a user via API
     * @param Request $request
     */
    public function login( Request $request ) {
        $request->validate( [
            'email'    => 'required|email',
            'password' => 'required',
        ] );

        $user = User::where( 'email', $request->email )->first();

        if ( !$user || !Hash::check( $request->password, $user->password ) ) {
            throw ValidationException::withMessages( [
                'email' => ['The provided credentials are incorrect.'],
            ] );
        }

        // Delete all previous tokens
        $user->tokens()->delete();

        // Generate New Token
        $token = $user->createToken( 'Bearer' );

        $data = [
            'token_type' => 'Bearer',
            'token'      => $token->plainTextToken,
        ];

        return ok( 'User auth token generated successfully', $data );
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return ok('Logout successfull');
    }
}
