<?php

namespace App\Components\Payment;

use App\Components\Payment\Single\CashPayment;
use App\Components\Payment\Single\StripePayment;

abstract class Payment
{
    public function __construct($paymentMethod)
    {
        switch ($paymentMethod) {
            case 'Stripe':
                $payment = $this->begin(new StripePayment());
            break;

            case 'Cash':
                $payment = $this->begin(new CashPayment());
            break;
        }
    }

    public function begin(PaymentMethodInterface $payment)
    {
        return $payment->acceptPayment();
    }
}