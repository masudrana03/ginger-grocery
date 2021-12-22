<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware( 'guest' )->except( 'logout' );
    }

    /**
     * @param Request $request
     * @param $user
     */
    protected function authenticated( Request $request, $user ) {
        if ( $user->type == 1 || $user->type == 2 ) {
            return redirect()->route( 'admin.dashboard' );
        }

        if ( $user->type == 3 ) {
            return redirect()->route( 'index' );
        }

        return redirect( '/' );
    }
}
