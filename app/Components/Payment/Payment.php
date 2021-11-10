<?php

namespace App\Components\Payment;

use App\Components\Payment\Single\CashPayment;
use App\Components\Payment\Single\StripePayment;
use App\Models\PaymentMethod;

/**
 * Undocumented class
 */
abstract class Payment
{
    /**
     * Handle payment process
     *
     * @param integer $paymentMethod
     */
    public function __construct($paymentMethod)
    {
        $paymentMethod = PaymentMethod::find($paymentMethod);

        switch ($paymentMethod->provider) {
            case 'stripe':
                $this->begin(new StripePayment());
            break;

            case 'cash':
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