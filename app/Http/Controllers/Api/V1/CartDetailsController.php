<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CartDetails;

class CartDetailsController extends Controller
{
    /**
     * Display a listing of the  CardDetails.
     * @param  App\Models\CartDetails $cartId
     *
     */
    public function getCardDetails(CartDetails $cartId){
        $cartrDetails = CartDetails::where('cart_id', $cartId->cart_id)->get();
        return ok('Cart list retrive successfully', $cartrDetails);
    }

}
