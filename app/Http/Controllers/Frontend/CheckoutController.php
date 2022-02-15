<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Point;
use App\Models\Promo;
use App\Models\Address;
use App\Models\Country;
use App\Models\UserPoint;
use App\Models\OrderStatus;
use Illuminate\Support\Str;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Components\Email\EmailFactory;
use App\Components\Payment\PaymentFactory;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user  = auth()->user();

        $countries = Country::all();
        $paymentMethods = PaymentMethod::active()->get();
        $savedAddress = Address::where('user_id', $user->id)->get();

        return view('frontend.checkout', compact('paymentMethods', 'countries', 'savedAddress'));
    }

    /**
     * Apply promo
     *
     * @param Request $request
     */
    public function applyPromo(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ], [
            'code.required' => 'Coupon code is required',
        ]);

        $cart = auth()->user()->cart;

        if (!$cart) {
            return back()->with('error', 'Your card is empty');
        }

        $promo = Promo::whereCode($request->code)->where('limit', '>', 0)->first();

        if (!$promo) {
            return back()->with('error', 'Invalid coupon code');
        }

        $cart->update(['promo_id' => $promo->id]);

        $total = 0;

        foreach ($cart->products as $product) {
            $total += $product->price * $product->quantity;
        }

        $discountAmount = getDiscountAmount($total, $promo->type, $promo->discount);
        $totalAfterDiscount = getAmountAfterDiscount($total, $promo->type, $promo->discount);

        session()->put('totalAfterDiscount', $totalAfterDiscount);
        session()->put('discountAmount', $discountAmount);

        return back()->with('success', 'Coupon applied');
    }

    /**
     * Payment method
     *
     * @param $request
     */
    public function placeOrder(Request $request)
    {
        $cart = Cart::with('products')->whereUserId(auth()->id())->first();
        

        if (!$cart) {
            return back()->with('error', 'Your cart is empty, please add product in your cart');
        }

        $userAddress = Address::where('id', $request->address_id)->first();

        if (! $userAddress) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'city' => 'required',
                'zip' => 'required',
                'phone_code' => 'required',
                'phone' => 'required',
            ]);
        }
            
        if (!$request->payment_method_id) {
            $provider = PaymentMethod::whereProvider('cash')->first();
        } else {
            $provider = PaymentMethod::find($request->payment_method_id);
        }

        if (!$provider) {
            return back()->with('error', 'Payment method not found');
        }

        $shippingId = $request->address_id;

        if (! $userAddress) {
            $shippingId = $this->createShippingAddress($request);
        }

        // $invoiceId = $this->createOrder($cart, $shippingId, $shippingId);

        $carts = $cart->products->groupBy('store_id');

        $orderReference = Str::random(12);

        foreach ($carts as $storeWiseitems) {
            $invoiceId = $this->createOrder($storeWiseitems, $shippingId, $shippingId, $orderReference, $request->payment_method_id, $request->note);
            // $this->sendOrderConfirmationEmail($invoiceId);
        }

        $cart->products()->detach();
        $cart->delete();

        // give points if match any condition
        //  $this->givePointsToCustomer($cart);

        // Send order confirmation email
        //  $this->sendOrderConfirmationEmail($invoiceId);

        // Accept payment
        return $this->acceptPayment($provider->provider, $orderReference);
    }

    /**
     * accept the payment
     *
     * @param string $provider
     * @param string $invoiceId
     * @return void
     */
    public function acceptPayment($provider, $invoiceId)
    {
        $paymentFactory = new PaymentFactory();
        $payment = $paymentFactory->initializePayment($provider);
        return $payment->acceptPayment($invoiceId);
    }

    /**
     * Create shipping address
     * @param Request $request
     */
    public function createBillingAddress(Request $request)
    {
        $address = new Address();
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->country_id = $request->country_id;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->user_id = auth()->id();
        $address->type = 1;
        $address->save();

        return $address->id;
    }

    /**
     * Create shipping address
     *
     * @param Request $request
     * @return void
     */
    public function createShippingAddress(Request $request)
    {
        $address = new Address();
        $address->name = $request->name;
        $address->email = $request->email;
        $address->address = $request->address;
        $address->phone_code = $request->phone_code;
        $address->phone = $request->phone;
        $address->country_id = $request->country_id;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->user_id = auth()->id();
        $address->type = 2;
        $address->save();
        
        return $address->id;
    }


    public function updateSavedShippingAddress(Request $request)
    {
        $userAddress = Address::where('id', $request->address_id);
        $address = new Address();
        $address->name = $userAddress->name;
        $address->email = $userAddress->email;
        $address->address = $userAddress->address;
        $address->phone = $userAddress->phone;
        $address->country_id = $userAddress->country_id;
        $address->state = $userAddress->state;
        $address->city = $userAddress->city;
        $address->zip = $userAddress->zip;
        $address->user_id = auth()->id();
        $address->type = 2;
        $address->where('id', $userAddress->id)->update();
        
        return $address->id;
    }

    /**
     * give points to customer
     */
    public function givePointsToCustomer($cart)
    {
        $totalPurchase = $cart->products->sum('price');

        $points = Point::where('points', '<=', $totalPurchase)->active()->orderByDesc('points', 'desc')->first();

        if (!$points) {
            return;
        }

        UserPoint::create([
            'user_id' => auth()->id(),
            'points'  => $points->points
        ]);

        // We can send notification after getting points
    }

    /**
     * Create order
     */
    public function createOrder($cart, $billingId, $shippingId, $orderReference, $paymentMethodId, $note = null)
    {
        // DB::beginTransaction();

        //try {
        $orderStatus = OrderStatus::whereName('Pending')->first();

        if (!$orderStatus) {
            return back()->with('error', 'Order status not found');
        }

        $calculatedPrice = priceCalculator($cart, $shippingId);

        $checkPromo = Cart::whereUserId(auth()->id())->first();

        if ($checkPromo && $checkPromo->promo_id) {
            $this->updatePromo($cart->promo_id);
        }

        $order                  = new Order();
        $order->invoice_id      = Str::random(10);
        $order->order_reference  = $orderReference;
        $order->order_status_id = $orderStatus->id;
        $order->subtotal        = $calculatedPrice['subtotal'];
        $order->discount        = $calculatedPrice['discount'];
        $order->adjust          = $calculatedPrice['adjust'];
        $order->total           = $calculatedPrice['total'];
        $order->shipping_cost   = $calculatedPrice['shipping'];
        $order->tax             = $calculatedPrice['tax'];
        $order->user_id         = auth()->id();
        $order->store_id        = $cart->first()->store_id;
        $order->billing_id      = $billingId;
        $order->shipping_id     = $shippingId;
        $order->payment_status  = false;
        $order->payment_method_id  = $paymentMethodId;
        $order->note  = $note;
        $order->delivery_otp    = rand(1000, 3999);

        $order->save();

        foreach ($cart as $item) {
            $orderDetails             = new OrderDetails();
            $orderDetails->order_id   = $order->id;
            $orderDetails->product_id = $item->id;
            $orderDetails->quantity   = $item->quantity;
            $orderDetails->save();
        }

        //DB::commit();

        session()->forget('totalAfterDiscount');
        session()->forget('discountAmount');

        return $order->invoice_id;
        //} catch (Exception $e) {
           // DB::rollback();
            //logger($e->getMessage());
            //return api()->error('Something went wrong');
        //}
    }

    /**
     * Update promo
     *
     * @param void
     */
    public function updatePromo($promoId)
    {
        $promo = Promo::find($promoId);
        $promo->update(['limit' => $promo->limit - 1, 'used' => $promo->limit + 1]);
    }

    /**
     * Send order confirmation email
     *
     * @param string $invoiceId
     */
    public function sendOrderConfirmationEmail($invoiceId)
    {
        $emailTemplate = EmailTemplate::whereType('Order')->first();
        $user = auth()->user();

        $body = preg_replace("/{user_name}/", $user->name, $emailTemplate->body);
        $body .= preg_replace("/{invoice_number}/", $invoiceId, $body);

        $emailDetails = [
            'email'   => auth()->user()->email,
            'subject' => $emailTemplate->subject,
            'body'    => $body
        ];

        (new EmailFactory())->initializeEmail($emailDetails);
    }

    public function ajaxShippingCalculation(Request $request){
        $address_id = request('address_id');
        
        

        
    }
}
