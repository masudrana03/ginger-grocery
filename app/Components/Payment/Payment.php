<?php

namespace App\Components\Payment;

use App\Components\Payment\Single\CashPayment;
use App\Components\Payment\Single\StripePayment;

/**
 * Undocumented class
 */
abstract class Payment
{
    public function __construct($paymentMethod)
    {
        switch ($paymentMethod) {
            case 'Stripe':
                $this->begin(new StripePayment());
            break;

            case 'Cash':
                $this->begin(new CashPayment());
            break;
        }
    }

    /**
     * Undocumented function
     *
     * @param PaymentMethodInterface $payment
     * @return void
     */
    public function begin(PaymentMethodInterface $payment)
    {
        return $payment->acceptPayment();
    }
}