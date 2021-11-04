<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CartDetails;
use Illuminate\Http\Request;

class CartDetailsController extends Controller
{
    /**
     * Display a listing of the CardDetails.
     *
     */
    public function getCardDetails(){
        return ok('Nutrition list retrived successfully', CartDetails::all());
    }

    /**
     * Display the specified nurtrition.
     *
     */
    public function CartDetails($id){
        return ok('Nutrition details retrive successfully', CartDetails::find($id));
    }
}
