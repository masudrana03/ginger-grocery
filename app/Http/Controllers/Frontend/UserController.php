<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Country;
use App\Models\OrderTrack;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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


    public function getAddress()
    {
        $user = auth()->user();
        $billingAddresses = auth()->user()->billingAddresses;
        $shippingAddresses = auth()->user()->shippingAddress;
        $test = '';

        $countries = Country::all();

        return view('frontend.users.address', compact('user', 'billingAddresses', 'shippingAddresses', 'countries'));
    }

    /**
     *  Store frontend user address information
     *
     * @param $request
     */
    public function addAddress(Request $request)
    {
        //    return $request;

        $this->validate($request, [
            'name'       => 'required',
            'phone'      => 'required',
            'email'      => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'zip'        => 'required',
        ]);

        $requestInfo = $request->all();

        $requestInfo['user_id'] = auth()->id();

        if ($request->type == 'billing') {
            $requestInfo['type'] = 1;
        } else {
            $requestInfo['type'] = 2;
        }

        // $is_primary = 0;

        // if ($request->has('is_primary')) {
        //     $is_primary  = 1;
        // }
        Address::create($requestInfo);

        return back();
    }

    /**
     *  Update frontend user address information
     *
     * @param $request
     */
    public function updateAddress(Request $request, $id)
    {
        // return $request;

        $addressId = Address::find($id);

        $this->validate($request, [
            'name'       => 'required',
            'phone'      => 'required',
            'email'      => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'zip'        => 'required',
        ]);

        $requestInfo = $request->all();

        if ($request->type == 'billing') {
            $requestInfo['type'] = 1;
        } else {
            $requestInfo['type'] = 2;
        }

        $addressId->update($requestInfo);

        return back();
    }


    /**
     *  Update frontend user address information
     *
     * @param $Id
     */
    public function destroyAddress($Id)
    {
        $address = Address::find($Id);

        if (count($address->shippingOrders) > 0) {
            // can't delete
            return back()->with('error', 'This address have placed order');
        }
        if (count($address->billingOrders) > 0) {
            // can't delete
            return back()->with('error', 'This address have placed order');
        }

        $address->delete();

        return back()->with('success', 'Address successfully deleted');
    }


    /**
     * Invoice show by order number
     *
     * @param $id
     */
    public function getInvoice($OrderId)
    {
        $order = Order::with('details.product', 'user', 'store')->find($OrderId);

        // return $order;
        return view('frontend.invoice', compact('order'));
    }


    public function getTrackOrders(Request $request)
    {
        if ($request->has('invoice_id')) {
            // return $request;
            $request->validate([
                'invoice_id' => 'required',
            ]);
            //  return "test done";
            $order = '';
            $userId  = auth()->user()->id;


            $checkUserId = Order::where('user_id', $userId)->get();


            if (!$checkUserId = '') {

                $order = Order::where('invoice_id', $request->invoice_id)->first();
            }

            if ($order == '') {
                return '0';
            }

            $orderStatusIds = OrderTrack::where('order_id', $order->id)->pluck('order_status_id')->unique()->toArray();
            $currentStatus = $order->status->name;

            $orderStatus = OrderStatus::find($orderStatusIds)->pluck('name')->toArray();




            return view('frontend.ajax.order-track', compact('orderStatus', 'currentStatus', 'order'));
            // return [$orderStatus, $currentStatus];



            // $orderStatusId = OrderTrack::where('order_id', $orderId);


        }
        $user  = auth()->user();
        // $orders = Order::with('status')->where('user_id', $user->id)->get();

        return view('frontend.users.track-order', compact('user'));
    }

    public function getProfile()
    {
        $countries = Country::all();
        $user = auth()->user();

        return view('frontend.users.profile', compact('user', 'countries'));
    }

    /**
     * @param $request
     */
    public function updateProfile(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required',
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

    public function updateProfileImage(Request $request)
    {
        $user = auth()->user();

        $filename = '';

        if ($request->hasFile('profile_image')) {
            $imageDirectory = 'assets/img/uploads/users/';

            deleteImage($user->image, $imageDirectory);

            $image             = $request->file('profile_image');
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/users/' . $filename);
            $thumbnailLocation = public_path('assets/img/uploads/users/thumbnail/' . $filename);

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        $request = $request->all();

        if ($filename != '') {
            $request['image'] = $filename;
        }

        $user->update($request);

        toast('Profile Image successfully updated', 'success');

        return redirect()->route('user.dashboard');
    }

    public function setPrimaryAddress(Request $request, $id)
    {
        $user = auth()->user();
        $billingAddresses = auth()->user()->billingAddresses;
        $shippingAddresses = auth()->user()->shippingAddress;
        $countries = Country::all();
        $request_info = $request->all();

        // $request_info['is_primary'] = 1;

        $primaryAddress = Address::find($id);
        $addresses = Address::all();

        foreach ($addresses as $address) {
            if ($address->id != $id) {
                $address->is_primary = 0;
                $address->save();
            }

            $primaryAddress->is_primary = 1;
            $primaryAddress->save();
        }

        return view("frontend.ajax.primary-address", compact('user', 'billingAddresses', 'shippingAddresses', 'countries'));
    }
}
