<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;
use App\Http\Controllers\Right;
class ShopOwnerForgetPasswordController extends Controller
{
    // load form forget password
    public function index() {
        return view('fronts.shop_owner.forget_password');
    }

    // reset password for shop owner
    public function reset_password(Request $r)
    {
        $shop_owner_email = $r->email;
        // check if email exist
        $result = DB::table("shop_owners")->where("email", $shop_owner_email)->first();

        if ($result!=null)
        {
            $id = md5($result->id);
            $i = Right::send_email($shop_owner_email, $id);
            // update recovery mode for shop owern
            DB::select("update shop_owners set recovery_mode=1 where md5(id)='{$id}'");
            if($i) {
                $r->session()->flash("sms", "Please check your email :)");
            }
            return view("fronts.shop_owner.login");
        }
        else{
            $r->session()->flash("sms1", "Your email does not exist in our Mastermalls!");
            return redirect('/shop-owner/forget-password')->withInput();
        }
    }

    // save new password
    public function save_password(Request $r)
    {
        $shop_owner = $r->session()->get('shop_owner');
        if($seeker==NULL)
        {
            return redirect('/shop-owner/login');
        }
        $shop_owner_id = session('shop_owner')->id;
        $data = [
            'password' => password_hash($r->password, PASSWORD_BCRYPT)
        ];
        if($r->password!=$r->confirm_password)
        {
            $r->session()->flash('sms1', "Your new password and confirm password is not match!");
            return redirect('/shop-owner/reset-password');
        }
        $i = DB::table('shop_owners')->where('id', $shop_owner_id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', "Your new password has been saved successfully!");
            return redirect('/shop-owner/reset-password');
        }
        else{
             $r->session()->flash('sms1', "Cannot reset your password!");
            return redirect('/shop-owner/reset-password');
        }
    }
    // load new password form for job seeker
    public function new_password($id)
    {
        $data['id'] = $id;
        return view("fronts.shop_owner.new_password", $data);
    }

    public function update_password(Request $r)
    {
        $pass = password_hash($r->password, PASSWORD_BCRYPT);
        DB::select("update shop_owners set password='{$pass}', recovery_mode=0 where md5(id)='{$r->id}' and recovery_mode=1");

        $r->session()->flash("sms", "You just reset your password. Please login with your new password.");
        return redirect('/shop-owner/login');
    }
}
