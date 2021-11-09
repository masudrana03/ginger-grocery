<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Promo;
use App\Models\OrderStatus;
use Illuminate\Support\Str;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Components\Email\Email;
use Illuminate\Support\Facades\DB;
use App\Components\Payment\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Handle checkout process
     *
     * @param CheckoutRequest $request
     */
    public function checkout(CheckoutRequest $request)
    {
        $payment = (new Payment($request->payment_method));

        if ($payment['status']) {
            $this->createOrder($request, $payment['payment_status']);

            // Send order confirmation email
            $emailTemplate = EmailTemplate::whereType('Order')->first();

            $emailDetails = [
                'to'      => auth()->user()->email,
                'subject' => $emailTemplate->subject,
                'body'    => $emailTemplate->body
            ];

            new Email($emailDetails);

            return ok('Order placed');
        }

        return api()->error('Something went wrong');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $paymentStatus
     * @return void
     */
    public function createOrder(Request $request, $paymentStatus)
    {
        DB::beginTransaction();

        try {
            $orderStatus = OrderStatus::whereName('Pending')->first();

            if (!$orderStatus) {
                return api()->notFound('Order status not found');
            }

            $cart = Cart::with('products')->whereUserId(auth()->id());

            $calculatedPrice = $this->priceCalculator($cart);

            $order                  = new Order();
            $order->invoice_id      = Str::random(10);
            $order->order_status_id = $orderStatus->id;
            $order->subtotal        = $calculatedPrice['subtotal'];
            $order->discount        = $calculatedPrice['discount'];
            $order->adjust          = $calculatedPrice['adjust'];;
            $order->total           = $calculatedPrice['total'];
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

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return api()->error('Something went wrong');
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $cart
     * @return void
     */
    public function priceCalculator($cart)
    {
        $subtotal = $cart->products->sum('price');
        
        $discount = 0;

        if ($cart->promo_id) {
            $promo = Promo::find($cart->promo_id);
            $discount = promoDiscount($subtotal, $promo->type, $promo->discount);
            $this->updatePromo($promo);
        }

        $shipping = ShippingService::whereStatus(1)->first();
        $tax = Tax::whereStatus(1)->first();

        $total = $subtotal - $discount + $shipping->price + taxCalculator($subtotal, $tax->percentage);

        return ['subtotal' => $subtotal, 'discount' => $discount, 'total' => $total, 'adjust' => 0];
    }

    /**
     * Update promo
     * 
     * @param \App\Models\Promo $promo
     */
    public function updatePromo(Promo $promo)
    {
        $promo->update(['limit' => $promo->limit - 1, 'used' => $promo->limit + 1]);
    }
}
