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
    public function acceptPayment($invoiceId)
    {
        if (!auth()->user()->stripe_customer_id) {
            return redirect()->route('payment_from_card', $invoiceId);
        }

        //$stripe = new \Stripe\StripeClient($this->client_secret);
        $stripe = new \Stripe\StripeClient('sk_test_51JwbCaKPFuTVnOHlK5v0C2Cs5Jg9nTqaTHLVwF8OjQUWr2KTOPSINl1rGrz10l0ZGcKfhlygra545iMdeeEw3ehy00wyx3AllM');

        $paymentMethods = [];

        foreach (auth()->user()->stripeCards as $paymentMethod) {
            $paymentMethods[] = $stripe->paymentMethods->retrieve(
                $paymentMethod->payment_method_id,
                []
            );
        }

        if (!$paymentMethods) {
            return redirect()->route('payment_from_card', $invoiceId);
        }

        $route = Route::current()->uri;

        if (strpos($route, 'api') !== false) {
            return view('api.saved-cards', compact('paymentMethods', 'invoiceId'));
        }

        return view('frontend.saved-cards', compact('paymentMethods', 'invoiceId'));
    }

    public function paymentFromSavedCard($invoiceId, $paymentMethodId)
    {
        $order = Order::whereInvoiceId($invoiceId)->first();
       // $userId = Order::whereInvoiceId($invoiceId)->user_id;

        //$stripeCustomer = StripeCustomer::whereUserId($userId)->first();
        // $stripeCustomer = StripeCustomer::whereUserId(auth()->id())->first();
        $user = auth()->user();

       // \Stripe\Stripe::setApiKey($config['api_key']);
        \Stripe\Stripe::setApiKey('sk_test_51JwbCaKPFuTVnOHlK5v0C2Cs5Jg9nTqaTHLVwF8OjQUWr2KTOPSINl1rGrz10l0ZGcKfhlygra545iMdeeEw3ehy00wyx3AllM');


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

    public function paymentFromCard($invoiceId)
    {
        $amount = Order::whereInvoiceId($invoiceId)->first()->total;

        $user = auth()->user();

        if (!$user->stripe_customer_id) {
            $stripe = new \Stripe\StripeClient('sk_test_51JwbCaKPFuTVnOHlK5v0C2Cs5Jg9nTqaTHLVwF8OjQUWr2KTOPSINl1rGrz10l0ZGcKfhlygra545iMdeeEw3ehy00wyx3AllM');

            $stripeCustomer = $stripe->customers->create([
                'description' => 'A new customer created',
            ]);

            $user->stripe_customer_id = $stripeCustomer->id;
            $user->save();
        }

        \Stripe\Stripe::setApiKey('sk_test_51JwbCaKPFuTVnOHlK5v0C2Cs5Jg9nTqaTHLVwF8OjQUWr2KTOPSINl1rGrz10l0ZGcKfhlygra545iMdeeEw3ehy00wyx3AllM');

        $intent = \Stripe\PaymentIntent::create([
            'amount' => $amount * 100,
            'currency' => 'usd',
            'customer' => $user->stripe_customer_id,
        ]);

        $clientSecret = $intent->client_secret;
        $publishKey   = 'pk_test_51JwbCaKPFuTVnOHlhR1SKo4lu2EC2lexmwFpEhUihKqXydW5iZ2BKdpwKoFD7A1bGGAU9BppwuKZH6XXpbc0z4Kd00mf16pHvG';

        $route = Route::current()->uri;

        if (strpos($route, 'api') !== false) {
            return view('api.stripe', compact('clientSecret', 'publishKey', 'invoiceId'));
        }

        return view('frontend.stripe', compact('clientSecret', 'publishKey', 'invoiceId'));
    }

    public function paymentSuccess($invoiceId, $paymentMethodId)
    {
        $order = Order::whereInvoiceId($invoiceId)->first();
        $order->payment_status = true;
        $order->save();

        if ($paymentMethodId != 'No') {
            $stripeCustomerCard = new StripeCustomerCard();
            $stripeCustomerCard->user_id = $order->user_id;
            $stripeCustomerCard->payment_method_id = $paymentMethodId;
            $stripeCustomerCard->save();
        }

        $route = Route::current()->uri;

        if (strpos($route, 'api') !== false) {
            view('frontend.order-placed');
        }

        return view('frontend.order-placed');
    }
}
