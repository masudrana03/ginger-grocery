<?php

namespace App\Components\Payment\Single;

use Exception;
use App\Models\Cart;
use App\Components\Payment\PayableInterface;
use App\Models\PaymentMethod;
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
     * @return array
     */
    public function acceptPayment()
    {
        // this method should accept the payment 
        // and if payment is successful then it returns an array with status 
        
        $cart = Cart::whereUserId(auth()->id())->first();

        $calculatedPrice = priceCalculator($cart);

        $stripe = new \Stripe\StripeClient($this->client_secret);
    
        $stripeCustomer = $stripe->customers->create([
            'description' => 'A new customer created',
        ]);

        \Stripe\Stripe::setApiKey($this->client_secret);

        $intent = \Stripe\PaymentIntent::create([
            'amount' => $calculatedPrice['total'] * 100,
            'currency' => 'usd',
            'customer' => $stripeCustomer->id,
        ]);

        $client_secret = $intent->client_secret;
        $publish_key   = $this->client_key;

        return view('api.stripe', compact('client_secret', 'publish_key'));

        // try {
        //     $request->user()->charge(
        //         $calculatedPrice['total'],
        //         $request->paymentMethodId
        //     );

        //     return ['status' => true, 'payment_status' => true];
        // } catch (Exception $e) {
        //     return ['status' => false, 'message' => $e->getMessage()];
        //     logger($e);
        // }
    }
} 