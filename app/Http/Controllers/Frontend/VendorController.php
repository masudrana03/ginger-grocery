<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function vendors()
    {
        return view('frontend.vendor');
    }

    public function vendorDetails()
    {
        return view('frontend.vendor-details');
    }
}
