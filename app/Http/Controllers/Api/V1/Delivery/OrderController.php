<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use App\Models\User;

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

        $user->notify(new NewOrderPlaced);

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
