<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Add referral code
     *
     * @return JsonResponse
     */
    public function getReferralCode()
    {
        return ok('Referral code retrieved successfully', auth()->user()->referral_token);
    }


    /**
     * Add date of birth
     *
     * @param Request $request
     * @return JsonResponse
     */
   public function addDateOfBirth(Request $request){

    $validation = validateData( [
        'date_of_birth'  => 'required|date'
    ] );

    $user = User::find(auth()->id());


    $user->update(['date_of_birth' => $request->date_of_birth]);

    return ok( 'Date of birth save successfully');
   }
}
