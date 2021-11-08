<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Cart;
use App\Models\Promo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Components\Payment\Payment;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;

class CheckoutController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * 
     */
    public function checkout(Request $request)
    {
        $payment = (new Payment($request->payment_method));

        if ($payment['status']) {
            $this->createOrder($request, $paymentStatus = null);
            // send email
            // send response
        }
    }

    /**
     * 
     */
    public function createOrder(Request $request, $paymentStatus)
    {
        $orderStatus = OrderStatus::whereName('Pending')->first();

        if (!$orderStatus) {
            return api()->notFound('Order status not found');
        }

        $cart = Cart::with('products')->whereUserId(auth()->id());

        $totalPrice = $cart->products->sum('price');

        if ($cart->promo_id) {
            $promo = Promo::find($cart->promo_id);
            $discount = promoDiscount($totalPrice, $promo->type, $promo->discount);
        }

        $subtotal = $totalPrice - $discount;

        $order                  = New Order();
        $order->invoice_id      = Str::random(10);
        $order->order_status_id = $orderStatus->id;
        $order->subtotal        = $subtotal;
        $order->discount        = $discount ?? 0;
        $order->adjust          = $orderStatus->id;
        $order->total           = $subtotal;
        $order->user_id         = auth()->id();
        $order->store_id        = $cart->products->first()->id;
        $order->payment_status  = $paymentStatus;
        $order->save();

        foreach ($cart->proucts as $item) {
            $orderDetails             = new OrderDetails();
            $orderDetails->order_id   = $order->id;
            $orderDetails->product_id = $item->product_id;
            $orderDetails->quantity   = $item->quantity;
            $orderDetails->save();
        }

        $cart->products()->detach();
        $cart->delete();
    }
}
