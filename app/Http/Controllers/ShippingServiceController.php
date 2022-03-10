<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingServiceRequest;
use App\Models\ShippingService;
use Illuminate\Http\Request;

class ShippingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.shipping_services.index');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function allShippingServices(Request $request)
    {
        //$storeId = auth()->user()->store_id;

        $columns = [
            0 => 'id',
            1 => 'title',
            2 => 'price',
            3 => 'status',
            4 => 'created_at',
            5 => 'id',
        ];

        $totalData = ShippingService::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $shippingServices = ShippingService::offset($start)
                                               ->limit($limit)
                                               ->orderBy($order, $dir)
                                               ->get();
        } else {
            $search = $request->input('search.value');

            $shippingServices =  ShippingService::where('id', 'LIKE', "%{$search}%")
                                                ->orWhere('title', 'LIKE', "%{$search}%")
                                                ->offset($start)
                                                ->limit($limit)
                                                ->orderBy($order, $dir)
                                                ->get();

            $totalFiltered = ShippingService::where('id', 'LIKE', "%{$search}%")
                                            ->orWhere('title', 'LIKE', "%{$search}%")
                                            ->count();
        }

        $data = [];

        if (!empty($shippingServices)) {
            foreach ($shippingServices as $shippingService) {
                $updateStatus = route('admin.shipping_services.update_status', $shippingService->id);
                $edit         = route('admin.shipping_services.edit', $shippingService->id);
                $delete       = route('admin.shipping_services.destroy', $shippingService->id);
                $token        = csrf_token();
                $class        = $shippingService->status == 'Active' ? 'status_btn_b' : 'status_btn_danger_b';

                $nestedData['id']         = $shippingService->id;
                $nestedData['title']     = $shippingService->title;
                $nestedData['price']      = settings('currency') . $shippingService->price;
                $nestedData['type']      = $shippingService->type;
                $nestedData['from']      = $shippingService->from;
                $nestedData['to']      = $shippingService->to;
                $nestedData['status']     = "<a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangeBannerStatus({$shippingService->id})' id='bannerStatus-{$shippingService->id}'>$shippingService->status</a>";
                $nestedData['created_at'] = $shippingService->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteShipping({$shippingService->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$shippingService->id}' action='{$delete}' method='POST' style='display: none;'>
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
            "data"            => $data,
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
        return view('backend.shipping_services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ShippingServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingServiceRequest $request)
    {
        //$requestData = $request->all();

        //$requestData['store_id'] = auth()->user()->store_id;

        if ($request->type == 'Condition on distance') {
            if (! settings('map_api_key')) {
                alert()->error('Failed!','Please set your google map api from settings.');

                return redirect()->route('admin.shipping_services.index');
            }
        }

        ShippingService::create($request->all());

        toast('Shipping service successfully created', 'success');

        return redirect()->route('admin.shipping_services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingService  $shippingService
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingService $shippingService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingService  $shippingService
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingService $shippingService)
    {
        return view('backend.shipping_services.edit', compact('shippingService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ShippingServiceRequest  $request
     * @param  \App\Models\ShippingService  $shippingService
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingServiceRequest $request, ShippingService $shippingService)
    {
        // $requestData = $request->all();

        // $requestData['store_id'] = auth()->user()->store_id;

        $shippingService->update($request->all());

        toast('Shipping service successfully updated', 'success');

        return redirect()->route('admin.shipping_services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingService  $shippingService
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingService $shippingService)
    {
        $shippingService->delete();

        toast('Shipping service successfully deleted', 'success');

        return redirect()->back();
    }

    /**
     * Update Shipping service status
     *
     * @param ShippingService $shippingService
     * @return void
     */
    public function updateStatus(ShippingService $shippingService)
    {
        $shippingService->update([
            'status' => $shippingService->status == 'Active' ? 'Inactive' : 'Active'
        ]);

        // if ($shippingService->status == 'Active') {
        //     $shippingServices = ShippingService::all();

        //     foreach ($shippingServices as $item) {
        //         if ($item->id != $shippingService->id) {
        //             $item->update([
        //                 'status' => 'Inactive'
        //             ]);
        //         }
        //     }
        // }


        toast('Status successfully updated', 'success');

        return redirect()->back();
    }
}
