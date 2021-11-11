<?php

namespace App\Components\Payment;

use Illuminate\Http\Request;

interface PaymentMethodInterface
{
    /**
     * Accept the payment
     *
     * @param Request|null $request
     */
    public function acceptPayment($request = null);
}