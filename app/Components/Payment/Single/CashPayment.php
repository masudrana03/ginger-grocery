<?php

namespace App\Components\Payment\Single;

use App\Components\Payment\PaymentMethodInterface;
use Illuminate\Http\Request;

class CashPayment implements PaymentMethodInterface
{
    /**
     * Accept cash payment
     *
     * @param Request $request
     * @return array
     */
    public function acceptPayment($request = null)
    {
       return ['status' => true, 'payment_status' => false];
    }
}