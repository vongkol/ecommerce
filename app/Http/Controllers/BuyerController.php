<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class BuyerController extends Controller
{
    //login form
    public function login()
    {
        return view('fronts.buyers.login');
    }

    // customer login
    public function is_login(Request $r)
    {
        $username = $r->username;
        $pass = $r->password;
        $user = DB::table('customers')->where('active',1)->where('username', $username)->first();
        if($user!=null)
        {
           
            if(password_verify($pass, $user->password))
            {
                if($r->session()->get('customer')!=NULL)
                {
                    $r->session()->forget('customer');
                    $r->session()->flush();
                }
                // save user to session
                $r->session()->put('customer', $user);
                return redirect('/');
            }
            else{
                $r->session()->flash('sms1', "Invalid username or password. Try again!");
                return redirect('/buyer/login')->withInput();
            }
        }
        else{
            $r->session()->flash('sms1', "Invalid username or password!");
            return redirect('/buyer/login')->withInput();
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
        return view('fronts.buyers.register');
    }

     // save new customer
     public function save(Request $r)
     {
        // check the email if it is valid or not
        if (!filter_var($r->email, FILTER_VALIDATE_EMAIL)) {
            $r->session()->flash('sms1', "Your email is invalid. Check it again!");
            return redirect('/buyer/register')->withInput();
        }
        $email = DB::table('customers')
            ->where('email', $r->email)
            ->where('active', 1)
            ->count();
        $username = DB::table('customers')
            ->where('username', $r->username)
            ->where('active', 1)
            ->count();
        if($email === 0 and $username === 0 ) {
            $data = array(
                'first_name' => $r->first_name,
                'last_name' => $r->last_name,
                'phone' => $r->phone,
                'email' => $r->email,
                'username' => $r->username,
                'password' => password_hash($r->password, PASSWORD_BCRYPT)
            );
            $sms = "You have registered successfully. Please Login!";
            $sms1 = "Cannot register your account. Please check inputs again!";
            $i = DB::table('customers')->insert($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/buyer/login');
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/buyer/register')->withInput();
            }
        } else {
            if ($email > 0) {
                $sms1 = "Your email already exist. Please use a different one!";
            } 
            if ($username > 0) {
                $sms1 = "Your username already exit. Please use a different one!";
            }
            $r->session()->flash('sms1', $sms1);
            return redirect('/buyer/register')->withInput();
        } 
    }

    //login form
    public function buyer()
    {
        return view('fronts.buyers.buyer');
    }
}
