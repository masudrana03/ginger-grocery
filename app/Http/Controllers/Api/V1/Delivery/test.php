interface PaymentMethodInterface
{
    public function acceptPayment();
}

class Checkout
{
    public function begin(PaymentMethodInterface $payment)
    {
        return $payment->acceptPayment();
    }
}

class CashPayment implements PaymentMethodInterface
{
    public function acceptPayment()
    {
       return 'Payment method is cache';
    }
}

class StripPayment implements PaymentMethodInterface
{
    public function acceptPayment()
    {
       return 'Payment method is strip';
    }
}

if ($request->paymentMethod == 'Cash') {
    echo (new Checkout)->begin(new CashPayment());
} else if ($request->paymentMethod == 'stripe') {
    echo (new Checkout)->begin(new StripePayment());
} elseif ($request->paymentMethod == 'paypal') {
    echo (new Checkout)->begin(new PaypalPayment());
}
