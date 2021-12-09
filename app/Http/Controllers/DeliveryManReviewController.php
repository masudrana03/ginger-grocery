<?php

namespace App\Http\Controllers;

use App\Models\DeliveryManReview;
use Illuminate\Http\Request;

class DeliveryManReviewController extends Controller
{
    public function index(){
        return view('backend.delivery_man_reviews.index');
    }

    public function getDeliveryReviews(Request $request)
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

        $totalData = DeliveryManReview::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $deliveryMen = DeliveryManReview::offset($start)
                                            ->limit($limit)
                                            ->orderBy($order, $dir)
                                            ->get();
        } else {
            $search = $request->input('search.value');

            $deliveryMen = DeliveryManReview::where('id', 'LIKE', "%{$search}%")
                                            // ->orWhere('name', 'LIKE', "%{$search}%")
                                            ->offset($start)
                                            ->limit($limit)
                                            ->orderBy($order, $dir)
                                            ->get();

            $totalFiltered = DeliveryManReview::where('id', 'LIKE', "%{$search}%")
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
                $class               = $deliveryMan->status == 'Approve' ? 'status_btn' : 'status_btn_danger';
                $class1              = $deliveryMan->online_status == 'Online' ? 'status_btn' : 'status_btn_danger';

                $nestedData['id']             = $deliveryMan->id;
                $nestedData['name']           = $deliveryMan->user->name;
                $nestedData['phone']          = $deliveryMan->user->phone;
                $nestedData['status']         = "<a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangeDeliveryManStatus({$deliveryMan->id})' id='deliveryManStatus-{$deliveryMan->id}'>$deliveryMan->status</a>";
                $nestedData['online_status']  = "<a href='javascript:void(0)' data-href='{$updateOnelineStatus}' data-toggle='tooltip' title='Change status' class='{$class1}' onclick='ChangeDeliveryManOnlineStatus({$deliveryMan->id})' id='deliveryManOnlineStatus-{$deliveryMan->id}'>$deliveryMan->online_status</a>";
                $nestedData['created_at']     = $deliveryMan->created_at->format('d-m-Y');
                $nestedData['actions']        = "
                <a href='{$show}' title='DETAILS' ><span class='far fa-eye'></span></a>
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
}
