<?php

namespace App\Components\Payment\Single;

use App\Components\Payment\PaymentMethodInterface;

class StripePayment implements PaymentMethodInterface
{
    public function acceptPayment()
    {
       return 'Payment method is stripe';
    }
}