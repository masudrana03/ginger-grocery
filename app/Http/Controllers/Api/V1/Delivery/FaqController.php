<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function getFaqlist() {

        $faq = Faq::where('status', 1 )->where( 'type', 2 )->get();

        return ok('Faq list retrived successfully', $faq );
    }
}
