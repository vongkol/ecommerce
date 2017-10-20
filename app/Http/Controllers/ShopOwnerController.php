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
              'gender' => $r->gender,
              'dob' => $r->dob,
              'phone' => $r->phone,
              'email' => $r->email,
              'username' => $r->username
          ];
          // check if username or email already exist or not
          $count_username = DB::table('shop_owners')->where('id',"!=", $r->id)
              ->where('username', $r->username)
              ->count();
          $count_email = DB::table('shop_owners')->where('id', "!=", $r->id)
              ->where('email', $r->email)
              ->count();
          if($count_email>0)
          {
              $r->session()->flash('sms1', "The email '{$r->email}' already exist. Change a new one!");
              return redirect('/shop-owner/profile/edit');
          }
          if($count_username>0)
          {
              $r->session()->flash('sms1', "The username '{$r->username}' already exist. Change a new one!");
              return redirect('/seeker/profile/edit');
          }
          // upload photo
        //   if($r->hasFile("photo")) {
        //       $file = $r->file('photo');
        //       $file_name = $r->id . "-" .$file->getClientOriginalName();
        //       $destinationPath = 'uploads/photo/';
        //       $file->move($destinationPath, $file_name);
        //       $data["profile_photo"] = $file_name;
        //   }
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
