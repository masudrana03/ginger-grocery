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
     *
     * @return JsonResponse
     */
    public function getAddresses()
    {
        return ok( 'Address retrived successfully',  Address::all());
    }

    /**
     * Store a newly created address.
     *
     * @param Request $request
     * @return JsonResponse
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
     * Display the specified user address define by user id.
     *
     * @param  $userId
     * @return JsonResponse
     */
    public function addressDetails( $userId )
    {
        $address = Address::where('user_id', $userId)->get();
        return ok( 'Address details retrived successfully', $address);
    }
}
