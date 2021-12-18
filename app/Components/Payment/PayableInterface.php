<?php

namespace App\Components\Payment;

use Illuminate\Http\Request;

interface PayableInterface
{
    /**
     * Accept the payment
     * @param string $invoiceId
     */
    public function acceptPayment($invoiceId);
}