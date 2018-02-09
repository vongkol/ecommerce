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
        $data['shop'] = DB::table('shops')
            ->where('shops.shop_owner_id', $shop_owner->id)
            ->where('active',1)->first();

        $shop_owner_id = session('shop_owner')->id;
        $data['packages'] = DB::table('packages')->where('active', 1)->get();
        $data['counter'] = DB::table('subscriptions')->where('shop_owner_id', $shop_owner_id)
            ->where('active', 1)->count();
        $data['subscription'] = DB::table('subscriptions')
            ->join('packages', 'subscriptions.package_id', "packages.id")
            ->where('subscriptions.active', 1)
            ->where('subscriptions.shop_owner_id', $shop_owner_id)
            ->select('subscriptions.*', 'packages.name', 'packages.type')
            ->first();
        $data['product_count'] = DB::table('products')
            ->join('shops', 'products.shop_id' , '=', 'shops.id')
            ->join('shop_owners', 'shop_owners.id', '=', 'shops.shop_owner_id')
            ->where('shop_owner_id', $shop_owner_id)
            ->where('products.active', 1)
            ->count();
        return view('fronts.shop_owner.index', $data);
    }
    // load edit profile form
    public function edit(Request $r)
    {
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
            return redirect('/shop-owner/login');
        }
        $data['shop_owner'] = DB::table('shop_owners')->where('id', session('shop_owner')->id)->first();
        return view('fronts.shop_owner.edit_profile', $data);
    }

      // update shop owner profile
      public function update(Request $r)
      {
          $data = [
              'first_name' => $r->first_name,
              'last_name' => $r->last_name,
              'phone' => $r->phone,
              'email' => $r->email,
          ];
          $count_email = DB::table('shop_owners')->where('id', "!=", $r->id)
              ->where('email', $r->email)
              ->count();
          if($count_email>0)
          {
              $r->session()->flash('sms1', "The email '{$r->email}' already exist. Change a new one!");
              return redirect('/shop-owner/profile/edit');
          }
          $i = DB::table('shop_owners')->where('id', $r->id)->update($data);
          if($i)
          {
              $r->session()->flash('sms', "Your profile has been saved successfully!");
               // save user to session
              $user = DB::table('shop_owners')->where('id', $r->id)->first();
              $r->session()->put('shop_owner', $user);
              return redirect('/shop-owner/profile');
          }
          else{
              $r->session()->flash('sms1', "Fail to save changes. You may not make any changes in your input!");
              return redirect('/shop-owner/profile/edit');
          }
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
        $pass = $r->pass;
        $user = DB::table('shop_owners')->where('active',1)->where('username', $username)->first();
        var_dump($user);
        
        if($user!=null)
        {
            if(password_verify($pass, $user->password))
            {
                if($r->session()->get('shop_owner')!=NULL)
                {
                    $r->session()->forget('shop_owner');
                    $r->session()->flush();
                }
                if($r->session()->get('customer')!=NULL)
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
        $request->session()->forget('shop_owner');
        $request->session()->flush();
        return redirect('/');
    }

    //login form
    public function register()
    {
        return view('fronts.shop_owner.register');
    }

     // save new shop owner
     public function save(Request $r)
     {
        // check the email if it is valid or not
        if (!filter_var($r->email, FILTER_VALIDATE_EMAIL)) {
            $r->session()->flash('sms1', "Your email is invalid. Check it again!");
            return redirect('/shop-owner/account/register')->withInput();
        }
        $email = DB::table('shop_owners')
            ->where('email', $r->email)
            ->where('active', 1)
            ->count();
        if($email === 0) {
            $data = array(
                'first_name' => $r->first_name,
                'last_name' => $r->last_name,
                'phone' => $r->phone,
                'email' => $r->email,
                'password' => password_hash($r->password, PASSWORD_BCRYPT)
            );
            $sms = "You have registered successfully. Please Login!";
            $sms1 = "Cannot register your account. Please check inputs again!";
            $i = DB::table('shop_owners')->insert($data);
            if ($i)
            {       
                $r->session()->flash('sms', $sms);
                return redirect('/shop-owner/account/register');
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/shop-owner/account/register')->withInput();
            }
        } else {
            if ($email > 0) {
                $sms1 = "Your email already exist. Please use a different one!";
            } 
            $r->session()->flash('sms1', $sms1);
            return redirect('/shop-owner/account/register')->withInput();
        } 
    }
    // load form forget password
    public function dashboard() {
        return view('fronts.shop_owner.shop_owner_dashboard');
    }
}
