<?php

namespace App\Http\Controllers;

use App\Models\StoreSetting;
use App\Http\Requests\StoreStoreSettingRequest;
use App\Http\Requests\UpdateStoreSettingRequest;

class StoreSettingController extends Controller
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
     * @param  \App\Http\Requests\StoreStoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StoreSetting  $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function show(StoreSetting $storeSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoreSetting  $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreSetting $storeSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreSettingRequest  $request
     * @param  \App\Models\StoreSetting  $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreSettingRequest $request, StoreSetting $storeSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoreSetting  $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreSetting $storeSetting)
    {
        //
    }
}
