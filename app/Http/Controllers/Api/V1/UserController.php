<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function addDateOfBirth(Request $request){

    $validation = validateData( [
        'date_of_birth'  => 'required|date'
    ] );

    $user = User::find(auth()->id());


    $user->update(['date_of_birth' => $request->date_of_birth]);

    return ok( 'Date of birth save successfully');


   }
}
