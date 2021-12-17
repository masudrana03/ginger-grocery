<?php

namespace App\Components\Payment\Single;

use App\Components\Payment\PayableInterface;

class CashPayment implements PayableInterface
{
    /**
     * Accept cash payment
     * 
     * @return array
     */
    public function acceptPayment(): array
    {
       return ['status' => true, 'payment_status' => false];
    }
}