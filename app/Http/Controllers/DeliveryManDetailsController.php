<?php

namespace App\Http\Controllers;

use App\Models\DeliveryManDetails;
use Illuminate\Http\Request;

class DeliveryManDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return;
        return view('backend.delivery_men.index');
    }


    public function allDeliveryManDetails(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'phone',
            3 => 'status',
            4 => 'online_status',
            5 => 'created_at',
            6 => 'id'
        ];

        $totalData = DeliveryManDetails::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $deliveryMen = DeliveryManDetails::offset($start)
                                            ->limit($limit)
                                            ->orderBy($order, $dir)
                                            ->get();
        } else {
            $search = $request->input('search.value');

            $deliveryMen = DeliveryManDetails::where('id', 'LIKE', "%{$search}%")
                                            // ->orWhere('name', 'LIKE', "%{$search}%")
                                            ->offset($start)
                                            ->limit($limit)
                                            ->orderBy($order, $dir)
                                            ->get();

            $totalFiltered = DeliveryManDetails::where('id', 'LIKE', "%{$search}%")
                // ->orWhere('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($deliveryMen)) {
            foreach ($deliveryMen as $deliveryMan) {
                $updateStatus        = route('admin.delivery_men.update_status', $deliveryMan->id);
                $updateOnelineStatus = route('admin.delivery_men.update_online_status', $deliveryMan->id);
                $show                = route('admin.delivery_men.show', $deliveryMan->id);
                $delete              = route('admin.delivery_men.destroy', $deliveryMan->id);
                $token               = csrf_token();
                $class               = $deliveryMan->status == 'Approve' ? 'status_btn_b' : 'status_btn_danger_b';
                $class1              = $deliveryMan->online_status == 'Online' ? 'status_btn_b' : 'status_btn_danger_b';

                $nestedData['id']             = $deliveryMan->id;
                $nestedData['name']           = $deliveryMan->user->name;
                $nestedData['phone']          = $deliveryMan->user->phone;
                $nestedData['status']         = "<a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangeDeliveryManStatus({$deliveryMan->id})' id='deliveryManStatus-{$deliveryMan->id}'>$deliveryMan->status</a>";
                $nestedData['online_status']  = "<a href='javascript:void(0)' data-href='{$updateOnelineStatus}' data-toggle='tooltip' title='Change status' class='{$class1}' onclick='ChangeDeliveryManOnlineStatus({$deliveryMan->id})' id='deliveryManOnlineStatus-{$deliveryMan->id}'>$deliveryMan->online_status</a>";
                $nestedData['created_at']     = $deliveryMan->created_at->format('d-m-Y');
                $nestedData['actions']        = "
                    &emsp;<a href='{$show}' title='DETAILS' ><span class='far fa-eye'></span></a>
                    &emsp;<a href='#' onclick='deletePromo({$deliveryMan->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$deliveryMan->id}' action='{$delete}' method='POST' style='display: none;'>
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
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryManDetails  $deliveryManDetails
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryManDetails $deliveryMan)
    {
        $deliveryMan->with('user','zone');

       return view('backend.delivery_men.view', compact('deliveryMan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryManDetails  $deliveryManDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryManDetails $deliveryManDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\DeliveryManDetails  $deliveryManDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryManDetails $deliveryManDetails)
    {
        //
    }

    /**
     * Update deliveryMan status
     *
     * @param DeliveryManDetails $deliveryMan
     * @return void
     */
    public function updateStatus(DeliveryManDetails $deliveryMan)
    {
        $deliveryMan->update([
            'status' => $deliveryMan->status == 'Approve' ? 'Block' : 'Approve'
        ]);

        toast('Delivery Man successfully updated', 'success');

        return redirect()->back();
    }

    /**
     * Update deliveryMan status
     *
     * @param DeliveryManDetails $deliveryMan
     * @return void
     */
    public function updateOnlineStatus(DeliveryManDetails $deliveryMan)
    {
        $deliveryMan->update([
            'online_status' => $deliveryMan->online_status == 'Online' ? 'Offline' : 'Online'
        ]);

        toast('Delivery Man successfully updated', 'success');

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryManDetails  $deliveryManDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryManDetails $deliveryMan)
    {

       $deliveryMan->delete();

       toast('Delivery Man successfully deleted', 'success');

       return back();
    }
}
