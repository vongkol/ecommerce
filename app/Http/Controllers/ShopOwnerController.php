<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class ShopOwnerController extends Controller
{

    public function index(Request $r) {
        // check if shop owner login
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
            return redirect('/shop-owner/login');
        }
        return view('fronts.shop_owner.index');
    }

    //login form
    public function login()
    {
        return view('fronts.shop_owner.login');
    }

    // customer login
    public function is_login(Request $r)
    {
        $username = $r->username;
        $pass = $r->password;
        $user = DB::table('shop_owners')->where('active',1)->where('username', $username)->first();
        if($user!=null)
        {
            if(password_verify($pass, $user->password))
            {
                if($r->session()->get('shop_owner')!=NULL)
                {
                    $r->session()->forget('shop_owner');
                    $r->session()->flush();
                }
                // save user to session
                $r->session()->put('shop_owner', $user);
                return redirect('/shop-owner/profile');
            }
            else{
                $r->session()->flash('sms1', "Invalid username or password. Try again!");
                return redirect('/shop-owner/login')->withInput();
            }
        }
        else{
            $r->session()->flash('sms1', "Invalid username or password!");
            return redirect('/shop-owner/login')->withInput();
        }
    }

    // logout function
    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        $request->session()->flush();
        return redirect('/');
    }

    //login form
    public function register()
    {
        return view('fronts.shop_owner.register');
    }

     // save new customer
     public function save(Request $r)
     {
        // check the email if it is valid or not
        if (!filter_var($r->email, FILTER_VALIDATE_EMAIL)) {
            $r->session()->flash('sms1', "Your email is invalid. Check it again!");
            return redirect('/shop-owner/register')->withInput();
        }
        $email = DB::table('shop_owners')
            ->where('email', $r->email)
            ->where('active', 1)
            ->count();
        $username = DB::table('shop_owners')
            ->where('username', $r->username)
            ->where('active', 1)
            ->count();
        if($email === 0 and $username === 0 ) {
            $data = array(
                'first_name' => $r->first_name,
                'last_name' => $r->last_name,
                'phone' => $r->phone,
                'email' => $r->email,
                'gender' => $r->gender,
                'dob' => $r->dob,
                'username' => $r->username,
                'password' => password_hash($r->password, PASSWORD_BCRYPT)
            );
            $sms = "You have registered successfully. Please Login!";
            $sms1 = "Cannot register your account. Please check inputs again!";
            $i = DB::table('shop_owners')->insert($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/shop-owner/login');
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/shop-owner/register')->withInput();
            }
        } else {
            if ($email > 0) {
                $sms1 = "Your email already exist. Please use a different one!";
            } 
            if ($username > 0) {
                $sms1 = "Your username already exit. Please use a different one!";
            }
            $r->session()->flash('sms1', $sms1);
            return redirect('/shop-owner/register')->withInput();
        } 
    }
    // load form forget password
    public function dashboard() {
        return view('fronts.shop_owner.shop_owner_dashboard');
    }
}
