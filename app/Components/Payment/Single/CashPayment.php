<?php

namespace App\Components\Payment\Single;

use App\Components\Payment\PaymentMethodInterface;


/**
 * Undocumented class
 */
class CashPayment implements PaymentMethodInterface
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function acceptPayment()
    {
       return ['status' => true, 'payment_status' => 'Unpaid'];
    }
}