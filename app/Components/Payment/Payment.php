<?php

namespace App\Components\Payment;

use App\Models\PaymentMethod;
use App\Components\Payment\Single\CashPayment;
use App\Components\Payment\Single\StripePayment;
use Illuminate\Http\Request;

class Payment
{
    /**
     * Handle payment process
     *
     * @param Request $request
     */
    public function handle($request)
    {
        $provider = PaymentMethod::find($request->payment_method)->provider;

        switch ($provider) {
            case 'stripe':
                return $this->begin(new StripePayment(), $request);
            break;

            case 'cash':
                return $this->begin(new CashPayment());
            break;
        }
    }

    /**
     * Start accepting payment process
     *
     * @param PaymentMethodInterface $payment
     * @param Request|null $request
     */
    public function begin(PaymentMethodInterface $payment, $request = null)
    {
        return $payment->acceptPayment($request);
    }
}