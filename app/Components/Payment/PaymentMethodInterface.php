<?php

namespace App\Components\Payment;

interface PaymentMethodInterface
{
    public function acceptPayment();
}