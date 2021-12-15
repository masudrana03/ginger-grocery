<?php

namespace App\Components\Payment;

use Illuminate\Http\Request;

interface PayableInterface
{
    /**
     * Accept the payment
     */
    public function acceptPayment();
}