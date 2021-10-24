<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller {
    public function test() {
        return ok( 'Api v1 is working' );
    }

    public function testAuth() {
        return ok( 'Api Auth v1 is working' );
    }

    /**
     * @param Request $request
     */
    public function store( Request $request ) {
        $validation = validateData( [
            'email' => 'required|email',
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }
    }
}