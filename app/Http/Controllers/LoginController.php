<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
      return view('backend.auth.login');
    }

    public function register()
    {
      return view('backend.auth.register');
    }
}
