<?php

namespace App\Components\Payment;

use Exception;
use App\Components\Payment\Single\CashPayment;
use App\Components\Payment\Single\PaypalPayment;
use App\Components\Payment\Single\StripePayment;

class PaymentFactory
{
    /**
     * Handle payment process
     *
     * @param string $provider
     */
    public function initializePayment($provider)
    {
        switch ($provider) {
            case 'stripe':
                return new StripePayment();
            break;

            case 'paypal':
                return new PaypalPayment();
            break;

            case 'cash':
                return new CashPayment();
            break;
        }

        throw new Exception("Unsupported payment method");
    }
}