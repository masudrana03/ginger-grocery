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
            2 => 'rating',
            3 => 'comment',
            4 => 'created_at',
            5 => 'id'
        ];

        $totalData = DeliveryManReview::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $deliveryManReview = DeliveryManReview::offset($start)
                                            ->limit($limit)
                                            ->orderBy($order, $dir)
                                            ->get();
        } else {
            $search = $request->input('search.value');

            $deliveryManReview = DeliveryManReview::where('id', 'LIKE', "%{$search}%")
                                            ->orWhere('name', 'LIKE', "%{$search}%")
                                            ->offset($start)
                                            ->limit($limit)
                                            ->orderBy($order, $dir)
                                            ->get();

            $totalFiltered = DeliveryManReview::where('id', 'LIKE', "%{$search}%")
                                              ->orWhere('name', 'LIKE', "%{$search}%")
                                              ->count();
        }

        $data = [];

        if (!empty($deliveryManReview)) {
            foreach ($deliveryManReview as $deliveryReview) {
                $delete              = route('admin.delivery_men.destroy', $deliveryReview->id);
                $token               = csrf_token();

                $nestedData['id']             = $deliveryReview->id;
                $nestedData['name']           = $deliveryReview->user->name;
                $nestedData['rating']         = $this->getReview($deliveryReview->rating);
                $nestedData['comment']        = $deliveryReview->comment;
                $nestedData['created_at']     = $deliveryReview->created_at->format('d-m-Y');
                $nestedData['actions']        = "
                    &emsp;<a href='#' onclick='deletePromo({$deliveryReview->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$deliveryReview->id}' action='{$delete}' method='POST' style='display: none;'>
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
     * Get the delivery boy review
     */
    public function getReview($review){

        // return $review;
        $star = 'fa fa-star';
        $starChecked = 'fa fa-star checked';

        $result = '';

        for ($i = 1; $i <= 5; $i++) {
            if ($review >= $i) {
                $result .= "<span class='{$starChecked}'></span> ";
            } else {
                $result .= "<span class='{$star}'></span>";
            }
        }

        return $result;

        // if($review == 0){
        //     return "<span class='fa fa-star'></span> <span class='fa fa-star'></span> </span><span class='fa fa-star'></span> </span><span class='fa fa-star'></span> </span><span class='fa fa-star'></span>";
        // }
        // if($review == 1){
        //     return "<span class='fa fa-star checked'></span> <span class='fa fa-star'></span> </span><span class='fa fa-star'></span> </span><span class='fa fa-star'></span> </span><span class='fa fa-star'></span>";
        // }
        // if($review == 2){
        //     return "<span class='fa fa-star checked'></span> <span class='fa fa-star checked'></span> </span><span class='fa fa-star'></span> </span><span class='fa fa-star'></span> </span><span class='fa fa-star'></span>";
        // }
        // if($review == 3){
        //     return "<span class='fa fa-star checked'></span> <span class='fa fa-star checked'></span> </span><span class='fa fa-star checked'></span> </span><span class='fa fa-star'></span> </span><span class='fa fa-star'></span>";
        // }
        // if($review == 4){
        //     return "<span class='fa fa-star checked'></span> <span class='fa fa-star checked'></span> </span><span class='fa fa-star checked'></span> </span><span class='fa fa-star checked'></span> </span><span class='fa fa-star'></span>";
        // }
        // if($review == 5){
        //     return "<span class='fa fa-star checked'></span> <span class='fa fa-star checked'></span> </span><span class='fa fa-star checked'></span> </span><span class='fa fa-star checked'></span> </span><span class='fa fa-star checked'></span>";
        // }

    }
}
