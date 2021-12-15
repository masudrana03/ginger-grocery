<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * login a user via API
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login( Request $request )
    {
        $validation = validateData( [
            'email'    => 'required|email',
            'password' => 'required',
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }

        $user = User::where( 'email', $request->email )->whereType(4)->first();

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

    /**
     * Logout a user via API
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return ok( 'Logout successfull' );
    }

    /**
     * Password changed a user via API
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function changePassword( Request $request )
    {
        $validation = validateData( [
            'old_password' => 'required',
            'new_password' => [
                'required',
                'confirmed',
                Password::min( 8 )
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }

        $user = auth()->user();

        if ( !Hash::check( $request->old_password, $user->password ) ) {
            throw ValidationException::withMessages( [
                'old_password' => ['The provided credentials are incorrect.'],
            ] );
        }

        $user->password = Hash::make( $request->new_password );
        $user->save();

        return ok( 'Password changed successfully' );
    }
}
