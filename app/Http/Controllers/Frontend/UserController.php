<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = auth()->user();

        return view('frontend.users.dashboard', compact('user'));
    }

    public function getOrders()
    {
        $user  = auth()->user();
        $orders = Order::with('status')->where('user_id', $user->id)->get();

        return view('frontend.users.order', compact('user', 'orders'));
    }


    /**
     *
     *
     * @param $id
     */
    public function getInvoice( $OrderId )
    {
        $order = Order::with('details.product', 'user', 'store')->find($OrderId);

        // return $order;
        return view('frontend.invoice', compact('order'));
    }


    public function getTrackOrders()
    {
        $user  = auth()->user();
        $orders = Order::with('status')->where('user_id', $user->id)->get();

        return view('frontend.users.track-order', compact('user', 'orders'));
    }

    public function getAddress()
    {
        $user = auth()->user();
        $billingAddresses = auth()->user()->billingAddresses;
        $shippingAddresses = auth()->user()->shippingAddress;
        

        return view('frontend.users.address', compact('user', 'billingAddresses', 'shippingAddresses'));
    }

    public function getProfile()
    {
        $user = auth()->user();

        return view('frontend.users.profile', compact('user'));
    }

    /**
     * @param $request
     */
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            $request->name => 'required',
            $request->email => 'required',
            $request->phone => 'required',
            $request->date_of_birth => 'required',
        ]);

        auth()->user()->update($request->all());

        return back();
    }

    public function changePassword()
    {
        $user = auth()->user();

        return view('frontend.users.change-password', compact('user'));
    }
    
    /**
     * @param $request
     */
    public function updatePassword(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = Auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Your Current password did not match');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Models\Models\User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
