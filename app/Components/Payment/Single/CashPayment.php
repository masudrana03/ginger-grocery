<?php

namespace App\Components\Payment\Single;

use App\Components\Payment\PaymentMethodInterface;

class CashPayment implements PaymentMethodInterface
{
    public function acceptPayment()
    {
       return 'Payment method is cash';
    }
}