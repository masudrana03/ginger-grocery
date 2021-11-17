<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the addresses.
     */
    public function getAddresses()
    {
        return ok( 'Address retrived successfully',  Address::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate( [
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

        $address = Address::create($request);

        return ok( 'Address save successfully', $address);
    }

    /**
     * Display the specified resource.
     *
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function addressDetails($userId)
    {
        $address = Address::where('user_id', $userId)->get();
        return ok( 'Address details retrived successfully', $address);
    }
}
