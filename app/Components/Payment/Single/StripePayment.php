<?php

namespace App\Components\Payment\Single;

use Exception;
use App\Models\Cart;
use App\Components\Payment\PaymentMethodInterface;
use App\Models\PaymentMethod;

class StripePayment implements PaymentMethodInterface
{

    public function __construct()
    {
        $stripe = PaymentMethod::whereProvider('stripe')->first();

        env('STRIPE_KEY', $stripe->client_key);
        env('STRIPE_SECRET', $stripe->client_secret);
    }

    public function acceptPayment($request = null)
    {
        $cart = Cart::whereUserId(auth()->id())->first();

        $calculatedPrice = priceCalculator($cart);

        try {
            $request->user()->charge(
                $calculatedPrice['total'],
                $request->paymentMethodId
            );

            return ['status' => true, 'payment_status' => true];
        } catch (Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
            logger($e);
        }
    }
} 
