<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class ManageShopOwnerController extends Controller
{
    // index
    public function index()
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        $data['shop_owners'] = DB::table('shop_owners')
            ->where('active',1)
            ->paginate(18);
        return view('shop_owners.index', $data);
    }
    // load create form
    public function create()
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        return view('shop_owners.create');
    }
     // job provider register
     public function save(Request $r)
     {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
         // check the email if it is valid or not
         if (!filter_var($r->email, FILTER_VALIDATE_EMAIL)) {
             $r->session()->flash('sms1', "Your email is invalid. Check it again!");
             return redirect('/shop-owner/create')->withInput();
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
                 'gender' => $r->gender,
                 'dob' => $r->dob,
                 'phone' => $r->phone,
                 'email' => $r->email,
                 'username' => $r->username,
                 'password' => password_hash($r->password, PASSWORD_BCRYPT)
             );
             $sms = "You have registered successfully. Please Login!";
             $sms1 = "Cannot register your account. Please check your inputs again!";
             $i = DB::table('shop_owners')->insert($data);
             if ($i)
             {
                 $r->session()->flash('sms', $sms);
                 return redirect('/shop-owner/create');
             }
             else
             {
                 $r->session()->flash('sms1', $sms1);
                 return redirect('/shop-owner/create')->withInput();
             }
         } else {
             if ($email > 0) {
                 $sms1 = "Your email already exist. Please use a different one!";
             } 
             if ($username > 0) {
                 $sms1 = "Your username already exit. Please use a different one!";
             }
             $r->session()->flash('sms1', $sms1);
             return redirect('/shop-owner/create')->withInput();
         } 
     }

     // load edit profile form
     public function edit(Request $r)
     {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
         $data['shop_owner'] = DB::table('shop_owners')->where('id', $r->id)->first();
         return view('shop_owners.edit', $data);
     }
    //update shop owner profile
    public function update(Request $r)
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        $email = DB::table('shop_owners')
            ->where('email', $r->email)
            ->where('id', '!=', $r->id)
            ->where('active', 1)
            ->count();

        $username = DB::table('shop_owners')
            ->where('username', $r->username)
            ->where('id', '!=', $r->id)
            ->where('active', 1)
            ->count();

        if($email === 0 and $username === 0 ) {
            $data = array(
                'first_name' => $r->first_name,
                'last_name' => $r->last_name,
                'gender' => $r->gender,
                'dob' => $r->dob,
                'phone' => $r->phone,
                'email' => $r->email,
                'username' => $r->username,
            );
            if($r->password)  {
                $data = array(
                    'password' => bcrypt($r->password),
                );
            }
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
            $i = DB::table('shop_owners')->where('id', $r->id)->update($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/shop-owner/edit/'.$r->id);
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/shop-owner/edit/'.$r->id);
            }
        } elseif ( $email > 0 or $username > 0) {
            if ($email > 0 and $username > 0) {
                $sms1 = "Your email and username already exit!";
            } elseif ($username) {
                $sms1 = "Your username already exit!";
            } else {
                $sms1 = "your email already exit!";
            }
            $r->session()->flash('sms1', $sms1);
            return redirect('/shop-owner/edit/'.$r->id);
        } 
    }
    // delete
    public function delete($id)
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        DB::table('shop_owners')->where('id', $id)->update(['active'=>0]);
        return redirect('/shop-owner');
    }
}
