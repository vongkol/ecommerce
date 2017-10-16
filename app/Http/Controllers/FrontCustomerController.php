<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class FrontCustomerController extends Controller
{
    // index
    public function index()
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        $data['employees'] = DB::table('employees')
            ->where('active',1)
            ->paginate(18);
        return view('employees.index', $data);
    }
    // load create form
    public function create()
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        return view('employees.create');
    }
    // save new customer
    public function save(Request $r)
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        $email = DB::table('employees')
            ->where('email', $r->email)
            ->where('active', 1)
            ->count();

        $username = DB::table('employees')
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
            $sms = "New job seeker has been registered successfully.";
            $sms1 = "Cannot register new job seeker.";
            $i = DB::table('employees')->insert($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/employee/create');
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/employee/create')->withInput();
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
            return redirect('/employee/create')->withInput();
        } 
    }
    // job seeker register
    public function register(Request $r)
    {
        // check the email if it is valid or not
        if (!filter_var($r->email, FILTER_VALIDATE_EMAIL)) {
            $r->session()->flash('sms1', "Your email is invalid. Check it again!");
            return redirect('/seeker/register')->withInput();
        }
        $email = DB::table('employees')
            ->where('email', $r->email)
            ->where('active', 1)
            ->count();
        $username = DB::table('employees')
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
            $sms1 = "Cannot register your account. Please check inputs again!";
            $i = DB::table('employees')->insert($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/seeker/login');
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/seeker/register')->withInput();
            }
        } else {
            if ($email > 0) {
                $sms1 = "Your email already exist. Please use a different one!";
            } 
            if ($username > 0) {
                $sms1 = "Your username already exit. Please use a different one!";
            }
            $r->session()->flash('sms1', $sms1);
            return redirect('/seeker/register')->withInput();
        } 
    }
    // job seeker login
    public function login(Request $r)
    {
        $username = $r->username;
        $pass = $r->password;
        $user = DB::table('employees')->where('active',1)->where('username', $username)->first();
        if($user!=null)
        {
            if(password_verify($pass, $user->password))
            {
                if($r->session()->get('employer')!=NULL)
                {
                    $r->session()->forget('employer');
                    $r->session()->flush();
                }
                // save user to session
                $r->session()->put('seeker', $user);
                return redirect('/seeker');
            }
            else{
                $r->session()->flash('sms1', "Invalid username or password. Try again!");
                return redirect('/seeker/login')->withInput();
            }
        }
        else{
            $r->session()->flash('sms1', "Invalid username or password!");
            return redirect('/seeker/login')->withInput();
        }
    }
    // logout function
    public function logout(Request $request)
    {
        $request->session()->forget('seeker');
        $request->session()->flush();
        return redirect('/seeker/login');
    }
    // delete
    public function delete($id)
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        DB::table('employees')->where('id', $id)->update(['active'=>0]);
        return redirect('/employee');
    }

    public function edit($id)
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        $data['employee'] = DB::table('employees')
            ->where('id',$id)->first();
        return view('employees.edit', $data);
    }

    public function update(Request $r)
    {
        if (Auth::user()==null)
        {
            return redirect('/login');
        }
        $email = DB::table('employees')
            ->where('email', $r->email)
            ->where('id', '!=', $r->id)
            ->where('active', 1)
            ->count();

        $username = DB::table('employees')
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
            $i = DB::table('employees')->where('id', $r->id)->update($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/employee/edit/'.$r->id);
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/employee/edit/'.$r->id);
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
            return redirect('/employee/edit/'.$r->id);
        } 
    }
}
