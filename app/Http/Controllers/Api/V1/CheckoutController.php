<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Tax;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Promo;
use App\Models\OrderStatus;
use Illuminate\Support\Str;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\PaymentMethod;
use App\Components\Email\Email;
use App\Models\ShippingService;
use Illuminate\Support\Facades\DB;
use App\Components\Payment\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    /**
     * Handle checkout process
     *
     * @param CheckoutRequest $request
     */
    public function checkout(CheckoutRequest $request)
    {
        $cart = Cart::with('products')->whereUserId(auth()->id())->first();

        if (!$cart) {
            return api()->error('Your cart is empty, please add product in your cart');
        }

        $payment = (new Payment())->handle($request);

        // Create order if payment status is true
        if ($payment['status']) {
            $invoiceId = $this->createOrder($cart, $payment['payment_status'], $request->billing_id, $request->shipping_id);

            // Send order confirmation email
            $this->sendOrderConfirmationEmail($invoiceId);

            return ok('Order placed');
        } else {
            return api()->error($payment['message']);
        }
    }

    /**
     * Create order
     *
     * @param Cart $cart
     * @param boolean $paymentStatus
     * @param integer $billingId
     * @param integer $shippingId
     */
    public function createOrder($cart, $paymentStatus, $billingId, $shippingId)
    {
        DB::beginTransaction();

        try {
            $orderStatus = OrderStatus::whereName('Pending')->first();

            if (!$orderStatus) {
                return api()->notFound('Order status not found');
            }

            $calculatedPrice = priceCalculator($cart);

            $this->updatePromo($cart->promo_id);

            $order                  = new Order();
            $order->invoice_id      = Str::random(10);
            $order->order_status_id = $orderStatus->id;
            $order->subtotal        = $calculatedPrice['subtotal'];
            $order->discount        = $calculatedPrice['discount'];
            $order->adjust          = $calculatedPrice['adjust'];;
            $order->total           = $calculatedPrice['total'];
            $order->user_id         = auth()->id();
            $order->store_id        = $cart->products->first()->id;
            $order->billing_id      = $billingId;
            $order->shipping_id     = $shippingId;
            $order->payment_status  = $paymentStatus;
            $order->save();

            foreach ($cart->products as $item) {
                $orderDetails             = new OrderDetails();
                $orderDetails->order_id   = $order->id;
                $orderDetails->product_id = $item->id;
                $orderDetails->quantity   = $item->quantity;
                $orderDetails->save();
            }

            $cart->products()->detach();
            $cart->delete();

            DB::commit();

            return $order->invoice_id;
        } catch (Exception $e) {
            DB::rollback();

            return api()->error('Something went wrong');
        }
    }

    /**
     * Update promo 
     *
     * @param integer $id
     */
    public function updatePromo($id)
    {
        $promo = Promo::find($id);
        $promo->update(['limit' => $promo->limit - 1, 'used' => $promo->limit + 1]);
    }

    public function sendOrderConfirmationEmail($invoiceId)
    {
        $emailTemplate = EmailTemplate::whereType('Order')->first();
        $user = auth()->user();

        $body = preg_replace("/{user_name}/", $user->name, $emailTemplate->body);
        $body = preg_replace("/{invoice_number}/", $invoiceId, $emailTemplate->body);

        $emailDetails = [
            'email'   => auth()->user()->email,
            'subject' => $emailTemplate->subject,
            'body'    => $body
        ];

        (new Email())->handle($emailDetails);
    }
}
