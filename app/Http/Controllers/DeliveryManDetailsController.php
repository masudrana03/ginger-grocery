<?php

namespace App\Http\Controllers;

use App\Models\DeliveryManDetails;
use App\Http\Requests\StoreDeliveryManDetailsRequest;
use App\Http\Requests\UpdateDeliveryManDetailsRequest;

class DeliveryManDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.delivery_men.index');
    }


    public function allDeliveryManDetails()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeliveryManDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryManDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryManDetails  $deliveryManDetails
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryManDetails $deliveryManDetails)
    {
        //
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
     * @param  \App\Http\Requests\UpdateDeliveryManDetailsRequest  $request
     * @param  \App\Models\DeliveryManDetails  $deliveryManDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryManDetailsRequest $request, DeliveryManDetails $deliveryManDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryManDetails  $deliveryManDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryManDetails $deliveryManDetails)
    {
        //
    }
}
