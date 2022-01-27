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
        if (isAdmin()) {
            // monthly chart
            $monthlySalesData = $this->monthlySalesData();
            $totalMonths = $monthlySalesData['totalMonths'];
            $totalMonthlySales = $monthlySalesData['totalMonthlySales'];
        
            // daily chart
            $dailySalesData = $this->dailySalesData();
            $totalDays = $dailySalesData['totalDays'];
            $totalDailyOrders = $dailySalesData['totalDailyOrders'];
            $totalDailySales = $dailySalesData['totalDailySales'];
            
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
                'totalMonths',
                'totalMonthlySales',
                'totalDays',
                'totalDailyOrders',
                'totalDailySales'
            ));
        } elseif (isShopManager(auth()->user()->store_id)) {
            // monthly chart
            $monthlySalesData = $this->monthlySalesData(auth()->user()->store_id);
            $totalMonths = $monthlySalesData['totalMonths'];
            $totalMonthlySales = $monthlySalesData['totalMonthlySales'];
       
            // daily chart
            $dailySalesData = $this->dailySalesData(auth()->user()->store_id);
            $totalDays = $dailySalesData['totalDays'];
            $totalDailyOrders = $dailySalesData['totalDailyOrders'];
            $totalDailySales = $dailySalesData['totalDailySales'];

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
                'totalMonths',
                'totalMonthlySales',
                'totalDays',
                'totalDailyOrders',
                'totalDailySales'
            ));
        }
    }

    public function monthlySalesData($storeId = null)
    {
        $query = Order::query();

        if ($storeId) {
            $query->whereStoreId($storeId);
        }

        $monthlySales = $query->select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as sum')
        )->where('payment_status', 1)
         ->whereYear('created_at', '=', now()->year)
         ->groupBy('year', 'month')
         ->get();

        $totalMonths = [];
        $totalMonthlySales = [];
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        foreach ($months as $key => $month) {
            $totalMonths[] = $month;
            foreach ($monthlySales as $monthlySale) {
                if ($key + 1 == $monthlySale->month) {
                    $totalMonthlySales[] = $monthlySale->sum;
                }
            }
        }

        return ['totalMonths' => $totalMonths, 'totalMonthlySales' => $totalMonthlySales];
    }

    public function dailySalesData($storeId = null)
    {
        $query = Order::query();

        if ($storeId) {
            $query->whereStoreId($storeId);
        }

        $dailySales = $query->select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('DAY(created_at) as day'),
            DB::raw('SUM(total) as totalSale'),
            DB::raw('COUNT(invoice_id) as totalOrder')
        )->where('payment_status', 1)
         ->whereMonth('created_at', '=', now()->month)
         ->groupBy('month', 'day')
         ->get();

        $totalDays = [];
        $totalDailyOrders = [];
        $totalDailySales = [];

        $i = 1;
        while ($i <= now()->daysInMonth) {
            $totalDays[] = $i;
            $totalDailyOrders[] = 0;
            $totalDailySales[] = 0;
            foreach ($dailySales as $dailySale) {
                if ($i == $dailySale->day) {
                    $totalDailyOrders[] = $dailySale->totalOrder;
                    $totalDailySales[] = $dailySale->totalSale;
                }
            }
            $i++;
        }

        return ['totalDays' => $totalDays, 'totalDailyOrders' => $totalDailyOrders, 'totalDailySales' => $totalDailySales];
    }
}
