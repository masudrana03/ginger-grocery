<?php

namespace App\Components\Payment\Single;

use App\Components\Payment\PaymentMethodInterface;

/**
 * Undocumented class
 */
class StripePayment implements PaymentMethodInterface
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function acceptPayment()
    {
       return 'Payment method is stripe';
    }
}