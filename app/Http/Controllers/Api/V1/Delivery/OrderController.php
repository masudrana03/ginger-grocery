<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use App\Models\User;

class OrderController extends Controller
{
    public function getOrderDetails($id) {
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
        )->where('order_id', $id)->get();

        return ok('Order details retrive successfully', $orderDetails);
    }

    public function getCustomerDetails($id){

        $userOrders = Order::find($id);

        $customerDetails = $userOrders->load('shipping', 'billing');

        return ok('Order customer details successfully', $customerDetails);
    }

    public function updateStatus( $orderId ,$status ){

        $orderStatus = OrderStatus::where('name' ,$status)->first();

        $order = Order::find($orderId);

        $order->order_status_id = $orderStatus->id;
        $order->save();

        $user = User::find($order->user_id);

        $user->notify(new NewOrderPlaced);

        return ok("Order {$status} successfully");

    }

    public function getOtp($orderId){

        $otp = Order::find($orderId);
        $orderOtp =  $otp->delivery_otp;

        return ok('Order Delivery OTP', $orderOtp );
    }

    public function getOtpVerify($orderId, $verifyOtp){

        $otp = Order::find($orderId);
        $orderOtp =  $otp->delivery_otp;

        if($verifyOtp == $orderOtp){
            return ok('Order Delivered', $orderOtp );
        }else{
            return api()->error('OTP dose not match');
        }

    }

}
