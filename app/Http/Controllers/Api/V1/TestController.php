<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return ok('Api v1 is working');
    }

    public function testAuth()
    {
        return ok('Api Auth v1 is working');
    }
}
