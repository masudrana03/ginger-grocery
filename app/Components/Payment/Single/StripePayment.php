<?php

namespace App\Components\Payment\Single;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\StripeCustomerCard;
use Illuminate\Support\Facades\Route;
use App\Components\Payment\PayableInterface;

class StripePayment implements PayableInterface
{
    protected $client_key;
    protected $client_secret;

    public function __construct()
    {
        $stripe = PaymentMethod::whereProvider('stripe')->first();

        $this->client_key = $stripe->client_key;
        $this->client_secret = $stripe->client_secret;
    }

    /**
     * Accept stripe payment
     *
     * @param string $invoiceId
     */
    public function acceptPayment($orderReference)
    {
        if (! $this->client_key && $this->client_secret) {
            return back()->with('Payment failed!');
        }

        if (!auth()->user()->stripe_customer_id) {
            return redirect()->route('payment_from_card', $orderReference);
        }

        //$stripe = new \Stripe\StripeClient($this->client_secret);
        $stripe = new \Stripe\StripeClient($this->client_secret);

        $paymentMethods = [];

        foreach (auth()->user()->stripeCards as $paymentMethod) {
            $paymentMethods[] = $stripe->paymentMethods->retrieve(
                $paymentMethod->payment_method_id,
                []
            );
        }

        if (!$paymentMethods) {
            return redirect()->route('payment_from_card', $orderReference);
        }

        $route = Route::current()->uri;

        if (strpos($route, 'api') !== false) {
            return view('api.saved-cards', compact('paymentMethods', 'invoiceId'));
        }

        return view('frontend.saved-cards', compact('paymentMethods', 'invoiceId'));
    }

    public function paymentFromSavedCard($invoiceId, $paymentMethodId)
    {
        $order = Order::whereOrderReference($invoiceId)->first();
        // $userId = Order::whereOrderReference($invoiceId)->user_id;

        //$stripeCustomer = StripeCustomer::whereUserId($userId)->first();
        // $stripeCustomer = StripeCustomer::whereUserId(auth()->id())->first();
        $user = auth()->user();

        // \Stripe\Stripe::setApiKey($config['api_key']);
        \Stripe\Stripe::setApiKey($this->client_secret);


        // try {
        \Stripe\PaymentIntent::create([
                'amount' => $order->total * 100,
                'currency' => 'usd',
                'customer' => $user->stripe_customer_id,
                'payment_method' => $paymentMethodId,
                'off_session' => true,
                'confirm' => true,
            ]);

        $order->payment_status = 'Paid';
        $order->save();

        return redirect()->route('payment_success', [$invoiceId, 'No']);
        // } catch (\Stripe\Exception\CardException $e) {
           // return response()->json('Something went wrong, please try again', 500);
            // Error code will be authentication_required if authentication is needed
            // return 'Error code is:' . $e->getError()->code;
            // $payment_intent_id = $e->getError()->payment_intent->id;
            // $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        //}
    }

    public function paymentFromCard($orderReference)
    {
        // return "https://checkout.stripe.com/pay/cs_test_a1oi8Ky5Yk6IHQOLm3e3VGqxvr3IozILP3IpCovVNXyInE6NLWKMn9TgoF#fidkdWxOYHwnPyd1blpxYHZxWjA0T3JnRmROVUNwUVNrSk1pbVc0Vk5qMWlwN0BGN2lgfWhyQ3VAbVBsbU50XXxhUjBsXzdHTmF1ck5qQ0EyRDRnQkJEUDxHdXVycE5fTTNdXXVnZjV%2FMU5hNTVoYzQzdU1zQicpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl";
        // $amount = Order::whereOrderReference($invoiceId)->first()->total;

        // $user = auth()->user();

        // if (!$user->stripe_customer_id) {
        //     $stripe = new \Stripe\StripeClient($this->client_secret);

        //     $stripeCustomer = $stripe->customers->create([
        //         'description' => 'A new customer created',
        //     ]);

        //     $user->stripe_customer_id = $stripeCustomer->id;
        //     $user->save();
        // }

        \Stripe\Stripe::setApiKey($this->client_secret);

        // $intent = \Stripe\PaymentIntent::create([
        //     'amount' => $amount * 100,
        //     'currency' => 'usd',
        //     'customer' => $user->stripe_customer_id,
        // ]);
        //header('Content-Type: application/json');

        $orders = Order::whereOrderReference($orderReference)->get();
        $line_items = [];

        foreach ($orders as $order) {
            foreach ($order->details as $item) {
                $temp_items = [
                  'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                      'name' => $item->product->name,
                    //   'images' => [asset('assets/img/uploads/products/featured/' . $item->product->featured_image)],
                    ],
                    'unit_amount' => $item->product->price * 100,
                  ],
                  'quantity' => $item->quantity,
                ];

                $line_items[] = $temp_items;
            }
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('payment_success', $orderReference),
            'cancel_url' => route('payment_failed', $orderReference),
          ]);
 
        return redirect($session->url);

        // $clientSecret = $intent->client_secret;
       //  $publishKey   = $this->client_key;

        //$route = Route::current()->uri;

        // if (strpos($route, 'api') !== false) {
        //     return view('api.stripe', compact('clientSecret', 'publishKey', 'invoiceId'));
        // }

       // return view('frontend.stripe', compact('clientSecret', 'publishKey', 'invoiceId'));
    }

    public function paymentSuccess($orderReference)
    {
        $orders = Order::whereOrderReference($orderReference)->get();

        foreach ($orders as $order) {
            $order->payment_status = true;
            $order->save();
        }

        // if ($paymentMethodId != 'No') {
        //     $stripeCustomerCard = new StripeCustomerCard();
        //     $stripeCustomerCard->user_id = $order->user_id;
        //     $stripeCustomerCard->payment_method_id = $paymentMethodId;
        //     $stripeCustomerCard->save();
        // }
        

        $route = Route::current()->uri;

        if (strpos($route, 'api') !== false) {
            view('frontend.order-placed');
        }

        //return view('frontend.order-placed');
        return redirect()->route('checkout')->with('success', 'Order Placed Successfully!');
    }

    public function paymentFailed($orderReference)
    {
        $orders = Order::whereOrderReference($orderReference)->get();

        foreach ($orders as $order) {
            $order->payment_status = false;
            $order->save();
        }

        // if ($paymentMethodId != 'No') {
        //     $stripeCustomerCard = new StripeCustomerCard();
        //     $stripeCustomerCard->user_id = $order->user_id;
        //     $stripeCustomerCard->payment_method_id = $paymentMethodId;
        //     $stripeCustomerCard->save();
        // }
        

        $route = Route::current()->uri;

        if (strpos($route, 'api') !== false) {
            view('frontend.order-placed');
        }

        //return view('frontend.order-placed');
        return redirect()->route('checkout')->with('error', 'Payment Failed!');
    }
}
