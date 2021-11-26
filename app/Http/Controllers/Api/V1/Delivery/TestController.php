<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        return ok( 'Delivery Api v1 is working' );
    }

    public function testAuth() {
        return ok( 'Delivery Api Auth v1 is working' );
    }
}
