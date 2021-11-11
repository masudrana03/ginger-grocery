<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetails;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('backend.carts.index');
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
     * @param Request $request
     * @return void
     */
    public function allCarts(Request $request)
    {
        $columns = [
            0 => 'id',
            2 => 'user_id',
            4 => 'created_at',
            5 => 'id',
        ];

        $totalData = Cart::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');


        if ( empty( $request->input( 'search.value' )) ) {
            $carts = Cart::offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();
        } else {
            $search = $request->input( 'search.value' );

            $carts = Cart::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'promo', 'LIKE', "%{$search}%" )
                ->offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();

            $totalFiltered = Cart::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'promo', 'LIKE', "%{$search}%" )
                ->count();
        }

        $data = [];

        if (!empty($carts)) {
            foreach ($carts as $cart) {
                $show         =  route('carts.show', $cart->id);
                $edit         =  route('carts.edit', $cart->id);
                $delete       =  route('carts.destroy', $cart->id);
                $token        =  csrf_token();

                $nestedData['id']         = $cart->id;
                $nestedData['user_id']    = $cart->user->name;
                $nestedData['promo']      = $cart->promo;

                $nestedData['created_at'] = $cart->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    <a href='{$show}' title='DETAILS' ><span class='far fa-eye'></span></a>
                    &emsp;<a href='#' onclick='deletecarts({$cart->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$cart->id}' action='{$delete}' method='POST' style='display: none;'>
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
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $cart->with('details','product');

        return view('backend.carts.details', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
