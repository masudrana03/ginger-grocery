<?php

namespace App\Components\Payment\Single;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Components\Payment\PayableInterface;

class CashPayment implements PayableInterface
{
    /**
     * Accept cash payment
     * @param string $invoiceId
     */
    public function acceptPayment($invoiceId)
    {
        $route = Route::current()->uri;

        if (strpos($route, 'api') !== false) {
            return view('api.order-placed');
        }

        return view('frontend.order-placed');
    }
}
