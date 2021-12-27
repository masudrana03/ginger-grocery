<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * @param $request
     */
    public function contacts(Request $request)
    {
        return view('contact');
    }
}
