<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class CustomerController extends Controller
{
    // index
    public function index()
    {
        $data['customers'] = DB::table('customers')
            ->where('active',1)
            ->paginate(18);
        return view('customers.index', $data);
    }
    // load create form
    public function create()
    {
        return view('customers.create');
    }
    // save new customer
    public function save(Request $r)
    {
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
            $sms = "New job customer has been registered successfully.";
            $sms1 = "Cannot register new job customer.";
            $i = DB::table('customers')->insert($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/customer/create');
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/customer/create')->withInput();
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
            return redirect('/customer/create')->withInput();
        } 
    }
    // delete
    public function delete($id)
    {
        DB::table('customers')->where('id', $id)->update(['active'=>0]);
        return redirect('/customer');
    }

    public function edit($id)
    {   
        $data['customer'] = DB::table('customers')
            ->where('id',$id)->first();
        return view('customers.edit', $data);
    }

    public function update(Request $r)
    {
        $email = DB::table('customers')
            ->where('email', $r->email)
            ->where('id', '!=', $r->id)
            ->where('active', 1)
            ->count();

        $username = DB::table('customers')
            ->where('username', $r->username)
            ->where('id', '!=', $r->id)
            ->where('active', 1)
            ->count();

        if($email === 0 and $username === 0 ) {
            $data = array(
                'first_name' => $r->first_name,
                'last_name' => $r->last_name,
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
            $i = DB::table('customers')->where('id', $r->id)->update($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/customer/edit/'.$r->id);
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/customer/edit/'.$r->id);
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
            return redirect('/customer/edit/'.$r->id);
        } 
    }
}
