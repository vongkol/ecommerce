<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class BuyerController extends Controller
{
    //login form
    public function login()
    {
        return view('fronts.buyers.login');
    }
    //login form
    public function register()
    {
        return view('fronts.buyers.register');
    }
    //login form
    public function buyer()
    {
        return view('fronts.buyers.buyer');
    }
}
