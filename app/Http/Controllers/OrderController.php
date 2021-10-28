<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index');
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
            8 => 'status',
            9 => 'created_at',
            10 => 'id',
        ];
    
        $totalData = Order::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');
            
        if (empty($request->input('search.value'))) {            
            $orders = Order::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        } else {
            $search = $request->input('search.value'); 

            $orders =  Order::with('status', 'details')->where('id','LIKE',"%{$search}%")
                            ->orWhereHas('user', function ($query) use ($search) {
                                $query->where('name', 'LIKE',"%{$search}%");
                            })
                            //->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Order::with('status', 'details')->where('id','LIKE',"%{$search}%")
                                ->orWhereHas('user', function ($query) use ($search) {
                                    $query->where('name', 'LIKE',"%{$search}%");
                                })
                                //->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = [];

        if (!empty($orders)) {
            foreach ($orders as $order) {
                $edit   =  route('orders.edit',$order->id);
                $delete =  route('orders.destroy', $order->id);
                $token  = csrf_token();

                $nestedData['id']         = $order->id;
                $nestedData['user_id']       = $order->user->name;
                $nestedData['store_id']       = $order->store->name;
                $nestedData['subtotal']       = $order->subtotal;
                $nestedData['discount']       = $order->discount;
                $nestedData['adjust']       = $order->adjust;
                $nestedData['total']      = $order->total;
                $nestedData['status']      = $order->status->name;
                $nestedData['created_at'] = $order->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
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
        //
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
        //
    }
}
