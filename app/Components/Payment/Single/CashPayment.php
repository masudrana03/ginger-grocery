<?php

namespace App\Components\Payment\Single;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Components\Payment\PayableInterface;
use App\Models\Order;



class CashPayment implements PayableInterface
{
    /**
     * Accept cash payment
     * @param string $invoiceId
     */
    public function acceptPayment($referenceId)
    {
        $route = Route::current()->uri;
        if (strpos($route, 'api') !== false){
            return back()->with('success', 'Order Placed Successfully!');
        }
        $order = Order::where('order_reference', $referenceId)->get();
        return view('frontend.post-checkout', compact('order'))->with('success', 'Your Order Placed Successfully!');
    }
}
