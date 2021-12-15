<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Point;
use App\Models\Promo;
use App\Models\UserPoint;
use App\Models\OrderStatus;
use Illuminate\Support\Str;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\PaymentMethod;
use App\Components\Email\Email;
use Illuminate\Support\Facades\DB;
use App\Components\Payment\Payment;
use App\Http\Controllers\Controller;
use App\Components\Email\EmailFactory;
use App\Http\Requests\CheckoutRequest;
use App\Components\Payment\PaymentFactory;

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
            return api()->notFound('Your cart is empty, please add product in your cart');
        }

        $provider = PaymentMethod::find($request->payment_method_id);

        if (! $provider) {
            return api()->notFound('Payment method not found');
        }

        // Accept payment
        $payment = $this->acceptPayment($provider->provider);

        // Create order if payment status is true
        if ($payment['status']) {
            $invoiceId = $this->createOrder($cart, $payment['payment_status'], $request->billing_id, $request->shipping_id);

            // give points if match any condition
            $this->givePointsToCustomer($cart);

            // Send order confirmation email
            $this->sendOrderConfirmationEmail($invoiceId);

            return ok('Order placed');
        } else {
            return api()->error($payment['message']);
        }
    }

    /**
     * accept the payment
     *
     * @param string $provider
     * @return array
     */
    public function acceptPayment($provider): array
    {
        $paymentFactory = new PaymentFactory();
        $payment = $paymentFactory->initializePayment($provider);
        return $payment->acceptPayment();
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

            if (! $orderStatus) {
                return api()->notFound('Order status not found');
            }

            $calculatedPrice = priceCalculator($cart);

            if ($cart->promo_id) {
                $this->updatePromo($cart->promo_id);
            }

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

    /**
     * Send order cnfirmation email
     *
     * @param string $invoiceId
     */
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

        (new EmailFactory())->initializeEmail($emailDetails);
    }

    /**
     * give points to customer
     *
     * @param Cart $cart
     */
    public function givePointsToCustomer($cart)
    {
        $totalPurchase = $cart->products->sum('price');

        $points = Point::where('points', '<=', $totalPurchase)->active()->orderByDesc('points', 'desc')->first();

        if (! $points) {
            return;
        }

        UserPoint::create([
            'user_id' => auth()->id(),
            'points'  => $points->points
        ]);

        // We can send notification after geting points
    }
}
