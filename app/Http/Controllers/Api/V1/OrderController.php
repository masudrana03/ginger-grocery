<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetails;



class OrderController extends Controller
{
    /**
     * Display a listing of the order by user id.
     * @param  integer $userId
     *
     */
    public function orderList($userId){

        $userOrders = Order::where('user_id', $userId)->get();

        $userAllOrders = $userOrders->load(
                                            'user:id,name',
                                            'store',
                                            'shipping',
                                            'billing'
                                           );

        return ok('User order list retrive successfully', $userAllOrders);
    }

    /**
     * Display the specified order details.
     * @param integer $orderId
     *
     */
    public function orderDetails($orderId){

        $orderDetails = OrderDetails::where('order_id', $orderId)->get();

        $userOrderDetails = $orderDetails->load(
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
                                                );

        return ok('Order details retrive successfully', $userOrderDetails);

    }
}
