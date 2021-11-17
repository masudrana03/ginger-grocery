<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->status) {
            $url = url('admin/all_orders');
        } else {
            $url = url('admin/all_orders?status=' . $request->status);
        }

        return view('backend.orders.index', compact('url'));
    }

    /**
     * @param Request $request
     * @return void
     */
    public function allOrders(Request $request)
    {
        $columns = [
            0 => 'id',
            2 => 'user_id',
            3 => 'store_id',
            4 => 'subtotal',
            5 => 'discount',
            6 => 'adjust',
            7 => 'total',
            8 => 'payment_status',
            9 => 'status',
            10 => 'created_at',
            11 => 'id',
        ];

        $totalData = Order::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        $query = Order::with('details', 'status');

        $orderStatus = $request->status;

        if ($orderStatus) {
            $orderStatus = OrderStatus::whereName($orderStatus)->firstOrFail();
            $query->where('order_status_id', $orderStatus->id);
        }

        if (empty($request->input('search.value'))) {
            $orders = $query->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $query = $query->where('id','LIKE',"%{$search}%")
                        ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'LIKE',"%{$search}%");
                    });

            $orders =  $query->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = $query->count();
        }

        $data = [];
        $orderStatuses = OrderStatus::all();

        if (!empty($orders)) {
            foreach ($orders as $order) {
                $updatePaymentStatus = route('admin.orders.updatePaymentStatus', $order->id );
                $show                = route('admin.orders.show', $order->id);
                $edit                = route('admin.orders.edit', $order->id);
                $delete              = route('admin.orders.destroy', $order->id);
                $token               = csrf_token();
                $status              = '';

                foreach ($orderStatuses as $orderStatus) {
                    $updateStatus = route('admin.orders.update_status', [$order->id, $orderStatus->id] );
                    $status .= "<a class='dropdown-item' <a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' onclick='ChangeOrderStatus({$orderStatus->id})' id='orderStatus-{$orderStatus->id}'>$orderStatus->name</a>";
                }

                $nestedData['id']              = $order->id;
                $nestedData['user_id']         = $order->user->name;
                $nestedData['store_id']        = $order->store->name;
                $nestedData['subtotal']        = $order->subtotal;
                $nestedData['discount']        = $order->discount;
                $nestedData['adjust']          = $order->adjust;
                $nestedData['total']           = $order->total;
                $class                         = $order->payment_status == 'Paid' ? 'status_btn' : 'status_btn_danger';
                $nestedData['payment_status']  = "<a href='javascript:void(0)' data-href='{$updatePaymentStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangePaymentStatus({$order->id})' id='paymentStatus-{$order->id}'>$order->payment_status</a>";

                // $nestedData['status']      = $order->status->name;

                $nestedData['status']      = "
                    <div class='dropdown'>
                    <button class='btn dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    {$order->status->name}
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton' x-placement='bottom-start' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);'>
                    $status
                    </div>
                    </div>
                    ";
                $nestedData['created_at'] = $order->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    <a href='{$show}' title='DETAILS' ><span class='far fa-eye'></span></a>
                    &emsp;<a href='#' onclick='deleteorder({$order->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$order->id}' action='{$delete}' method='POST' style='display: none;'>
                    <input type='hidden' name='_token' value='{$token}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    </form>
                    ";
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];

        echo json_encode($json_data);
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->with('details', 'product', 'user', 'store');

        return view('backend.orders.details', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->status()->delete();
        $order->delete();

        toast('Order successfully deleted', 'success');

        return redirect()->back();
    }

    /**
     * Update order status.
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return void
     */
    public function updateStatus(Order $order, OrderStatus $orderStatus)
    {
        $order->update(['order_status_id' => $orderStatus->id]);

        toast( 'Status successfully updated', 'success' );

        return redirect()->back();
    }

    /**
     * Update Pament status
     *
     * @param Order $order
     * @return void
     */
    public function updatePaymentStatus(Order $order)
    {

        $order->update([
            // 'payment_status' => $order->payment_status == 'Paid' ? 'Unpaid' : 'Paid'
            'payment_status' => 'Paid'
        ]);

       // return  $order->payment_status;

        toast( 'Status successfully updated', 'success' );

        return redirect()->back();
    }
}
