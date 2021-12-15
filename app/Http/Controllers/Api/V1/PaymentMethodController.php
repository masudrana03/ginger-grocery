<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
   /**
     * Display a listing of the Payment method.
     *
     * @return JsonResponse
     */
    public function getPaymentMethod()
    {
        return ok('Payment Method list retrieved successfully', PaymentMethod::all());
    }

    /**
     * Display the specified payment method.
     *
     * @param integer $paymentMethodId
     * @return JsonResponse
     */
    public function paymentMethodDetails( $paymentMethodId )
    {
        return ok('Payment method details retrieved successfully', PaymentMethod::find( $paymentMethodId ));
    }
}
