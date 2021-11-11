<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getReferralCode()
    {
        return ok( 'Referral code retrived successfully', auth()->user()->referral_token);
    }
}
