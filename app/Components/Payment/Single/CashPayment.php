<?php

namespace App\Components\Payment\Single;

use App\Components\Payment\PaymentMethodInterface;

class CashPayment implements PaymentMethodInterface
{
    public function acceptPayment($request = null)
    {
       return ['status' => true, 'payment_status' => false];
    }
}