<?php

namespace App\Components\Payment\Single;

use App\Components\Payment\PayableInterface;

class CashPayment implements PayableInterface
{
    /**
     * Accept cash payment
     * @param string $invoiceId
     */
    public function acceptPayment($invoiceId)
    {
       return view('api.order-placed');
    }
}