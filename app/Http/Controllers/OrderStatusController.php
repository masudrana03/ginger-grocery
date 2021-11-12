<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Requests\OrderStatusRequest;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.order_statuses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.order_statuses.create');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function allorderStatuses(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            3 => 'created_at',
            4 => 'id',
        ];

        $totalData = OrderStatus::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $orderStatuses = OrderStatus::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $orderStatuses = OrderStatus::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = OrderStatus::where('id','LIKE',"%{$search}%")
                                ->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = [];

        if (!empty($orderStatuses)) {
            foreach ($orderStatuses as $orderStatus) {
                $edit   =  route('admin.order_statuses.edit', $orderStatus->id);
                $delete =  route('admin.order_statuses.destroy', $orderStatus->id);
                $token  = csrf_token();

                $nestedData['id']         = $orderStatus->id;
                $nestedData['name']       = $orderStatus->name;
                $nestedData['created_at'] = $orderStatus->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteOrderStatus({$orderStatus->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$orderStatus->id}' action='{$delete}' method='POST' style='display: none;'>
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
     * Store a newly created resource in storage.
     *
     * @param  \App\http\Requests\OrderStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStatusRequest $request)
    {
        OrderStatus::create($request->all());

        toast('Order Status successfully created', 'success');

        return redirect()->route('admin.order_statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderStatus $orderStatus)
    {
        return view('backend.order_statuses.edit', compact('orderStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\http\Requests\OrderStatusRequest  $request
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderStatus $orderStatus)
    {
        $orderStatus->update($request->all());

        toast('Order Status successfully updated', 'success');

        return redirect()->route('admin.order_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        $orderStatus->delete();

        toast('Order status successfully deleted', 'success');

        return redirect()->back();
    }
}
