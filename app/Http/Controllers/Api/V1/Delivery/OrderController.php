<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderDetails;
use App\Http\Controllers\Controller;
use App\Notifications\Delivery\OrderPicked;
use App\Notifications\Delivery\OrderAccepted;
use App\Notifications\Delivery\OrderCanceled;
use App\Notifications\Delivery\PaymentFailed;
use App\Notifications\Delivery\NewOrderPlaced;
use App\Notifications\Delivery\OrderDelivered;
use App\Notifications\Delivery\OrderInProgress;
use App\Notifications\Delivery\ProductOnTheWay;

class OrderController extends Controller
{
    /**
     * Display a listing of the order with there relational data..
     *
     *
     * @param integer $orderId
     * @return JsonResponse
     */
    public function getOrderDetails( $orderId )
    {
        $orderDetails = OrderDetails::with(
            'order',
            'order.user:id,name',
            'order.store',
            'order.shipping',
            'order.billing',
            'product',
            'product.brand',
            'product.category',
            'product.unit',
            'product.user:id,name',
            'product.store',
            'product.currency',
            'product.types',
            'product.nutritions',
            'product.images'
        )->where('order_id', $orderId )->get();

        return ok('Order details retrive successfully', $orderDetails);
    }

    /**
     * Display the specified order user with there relational data..
     *
     * @param integer $orderId
     * @return JsonResponse
     */
    public function getCustomerDetails($orderId)
    {
        $userOrders = Order::find($orderId);

        $customerDetails = $userOrders->load('shipping', 'billing');

        return ok('Order customer details successfully', $customerDetails);
    }

    /**
     * Updated order status.
     *
     * @param integer $orderId
     * @param boolean $status
     * @return JsonResponse
     */
    public function updateStatus( $orderId , $status )
    {

        $orderStatus = OrderStatus::where('name' ,$status)->first();

        $order = Order::find($orderId);

        $order->order_status_id = $orderStatus->id;
        $order->save();

        $user = User::find($order->user_id);

        if( $status == 'Accepted' ){
            $user->notify(new OrderAccepted);
        }
        if( $status == 'Processing' ){
            $user->notify(new OrderInProgress);
        }
        if( $status == 'Picked up' ){
            $user->notify(new OrderPicked);
        }
        if( $status == 'Product On The Way' ){
            $user->notify(new ProductOnTheWay);
        }
        if( $status == 'Delivered' ){
            $user->notify(new OrderDelivered);
        }
        if( $status == 'Canceled' ){
            $user->notify(new OrderCanceled);
        }
        if( $status == 'Payment Failed' ){
            $user->notify(new PaymentFailed);
        }

        return ok("Order {$status} successfully");

    }

    /**
     * Order OTP Send user.
     *
     * @param integer $orderId
     * @return JsonResponse
     */
    public function getOtp( $orderId )
    {
        $otp = Order::find($orderId);
        $orderOtp =  $otp->delivery_otp;

        return ok('Order Delivery OTP', $orderOtp );
    }


    /**
     * Order OTP verification.
     *
     * @param integer $orderId
     * @param integer $verifyOtp
     * @return JsonResponse
     */
    public function getOtpVerify( $orderId, $verifyOtp )
    {

        $otp = Order::find($orderId);
        $orderOtp =  $otp->delivery_otp;

        if($verifyOtp == $orderOtp){
            return ok('Order Delivered', $orderOtp );
        }else{
            return api()->error('OTP dose not match');
        }

    }

    /**
     * Order Payment status if it's cash on Delivery.
     *
     * @param integer $orderId
     * @return JsonResponse
     */
    public function getCash($orderId)
    {
        $order = Order::find($orderId);

        $order->payment_status = true;
        $order->save();

        return ok('Payment successfully collected');
    }

}
