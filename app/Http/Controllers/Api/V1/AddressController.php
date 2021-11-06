<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ok( 'Api v1 is working' );
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

        $validation = validateData( [
            'name'     => 'required',
            'email'    => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'country'  => 'required',
            'city'     => 'required',
            'zip'      => 'required',
            'type'     => 'required',
        ] );

        $request = $request->except('_token');

        $request['user_id'] = auth()->id();

        Address::create($request);

        return ok( 'Address save successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $address = Address::where('user_id', $userId)->get();
        return ok( 'Address details retrived successfully', $address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
