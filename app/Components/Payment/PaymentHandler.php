<?php

namespace App\Components\Payment;

abstract class PaymentHandler
{
    
    public function begin(PaymentMethodInterface $payment)
    {
        return $payment->acceptPayment();
    }
}