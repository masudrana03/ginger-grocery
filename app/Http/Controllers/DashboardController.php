<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use App\Models\Zone;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::count();
        $pendingOrders = OrderStatus::whereName('Pending')->count();
        $processingOrders = OrderStatus::whereName('Processing')->count();
        $canceledOrders = OrderStatus::whereName('canceled')->count();
        $customers = User::whereType(3)->count();
        $vendors = Store::count();
        $products = Product::count();
        // $zones = empty(Zone::count()) ? 0 : Zone::count();
        $deliveryMans = User::whereType(4)->count();
        $brands = Brand::count();

        return view('backend.dashboard', compact(
            'orders',
            'pendingOrders',
            'processingOrders',
            'canceledOrders',
            'customers',
            'vendors',
            'products',
            // 'zones',
            'deliveryMans',
            'brands'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
