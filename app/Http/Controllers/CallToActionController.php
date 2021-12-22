<?php

namespace App\Http\Controllers;

use App\Models\CallToAction;
use App\Http\Requests\StoreCallToActionRequest;
use App\Http\Requests\UpdateCallToActionRequest;

class CallToActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCallToActionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCallToActionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CallToAction  $callToAction
     * @return \Illuminate\Http\Response
     */
    public function show(CallToAction $callToAction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CallToAction  $callToAction
     * @return \Illuminate\Http\Response
     */
    public function edit(CallToAction $callToAction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCallToActionRequest  $request
     * @param  \App\Models\CallToAction  $callToAction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCallToActionRequest $request, CallToAction $callToAction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CallToAction  $callToAction
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallToAction $callToAction)
    {
        //
    }
}
