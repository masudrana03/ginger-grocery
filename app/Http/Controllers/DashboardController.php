<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zone;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailySales = DB::table('orders')->select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('DAY(created_at) as day'),
            DB::raw('SUM(total) as sum')
        )
        ->where('payment_status', 1)
        ->whereMonth('created_at', '=', now()->month)
        ->groupBy('month', 'day')
        ->get();

        $days = $dailySales->pluck('day');
        $dailySale = $dailySales->pluck('sum');

        if (isAdmin()) {
            $monthlySales = DB::table('orders')->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total) as sum')
            )
            ->where('payment_status', 1)
            ->whereYear('created_at', '=', now()->year)
            ->groupBy('year', 'month')
            ->pluck('sum');
            
            $orders = Order::count();
            $sales = Order::sum('total');
            $customers = User::whereType(3)->count();
            $vendors = Store::count();
            $dashboardProducts = Product::count();
            $dashboardCategories = Category::count();
            $dashboardZones = Zone::count();
            $deliveryMans = User::whereType(4)->count();

            return view('backend.dashboard', compact(
                'orders',
                'sales',
                'customers',
                'vendors',
                'dashboardProducts',
                'dashboardZones',
                'deliveryMans',
                'dashboardCategories',
                'monthlySales',
                'days',
                'dailySale'

            ));
        } elseif (isShopManager(auth()->user()->store_id)) {

            $dailySales = DB::table('orders')->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('DAY(created_at) as day'),
                DB::raw('SUM(total) as sum')
            )
            ->where('payment_status', 1)
            ->whereMonth('created_at', '=', now()->month)
            ->groupBy('month', 'day')
            ->get();
    
            $days = $dailySales->pluck('day');
            $dailySale = $dailySales->pluck('sum');


            $monthlySales = DB::table('orders')->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total) as sum')
            )
            ->where('payment_status', 1)
            ->whereYear('created_at', '=', now()->year)
            ->groupBy('year', 'month')
            ->pluck('sum');
            
            $orders = Order::whereStoreId(auth()->user()->store_id)->count();

            $sales = Order::whereStoreId(auth()->user()->store_id)->sum('total');

            $pendingOrders = Order::whereHas('status', function ($q) {
                $q->where('name', 'Pending');
            })->whereStoreId(auth()->user()->store_id)->count();

            $processingOrders = Order::whereHas('status', function ($q) {
                $q->where('name', 'Processing');
            })->whereStoreId(auth()->user()->store_id)->count();

            $canceledOrders = Order::whereHas('status', function ($q) {
                $q->where('name', 'canceled');
            })->whereStoreId(auth()->user()->store_id)->count();

            $customers = Order::whereStoreId(auth()->user()->store_id)->groupBy('user_id')->count();
            $dashboardProducts = Product::whereStoreId(auth()->user()->store_id)->count();
            $reviews = Store::find(auth()->user()->store_id)->totalRating;

            return view('backend.dashboard', compact(
                'orders',
                'sales',
                'customers',
                'processingOrders',
                'canceledOrders',
                'reviews',
                'dashboardProducts',
                'pendingOrders',
                'monthlySales',
                'days',
                'dailySale'
            ));
        }
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
