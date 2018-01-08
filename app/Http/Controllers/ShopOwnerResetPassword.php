<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class ShopOwnerResetPassword extends Controller
{
    public function index(Request $r) {
        // check if shop owner login
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
            return redirect('/shop-owner/login');
        }
        $data['owner_id'] = $shop_owner;
        return view('fronts.shop_owner.reset_password',$data);
    }

      // update password 
      public function update(Request $r)
      {
          $data = ['password' => password_hash($r->new_password, PASSWORD_BCRYPT)];
          // check if old password are equal
          $count_owner = DB::table('shop_owners')->where('id',"=", $r->id)
              
              ->count();
          if($count_owner<0)
          {
              $r->session()->flash('sms1', "Your old password is not match!");
              return redirect('/shop-owner/resetpwd');
          }
          // check if new password not equal re-password
          else if($r->new_password!=$r->re_password){
              $r->session()->flash('sms1', "Your new password is not march!");
              return redirect('/shop-owner/resetpwd');
          }else{
              $affected = DB::table('shop_owners')->where('id', $r->id)->update($data);
              if($affected){
                $r->session()->flash('sms', "Your password has been changed successfully!");
                return redirect('/shop-owner/resetpwd');
              }
              $r->session()->flash('sms', "Chaging password failed!");
              return redirect('/shop-owner/resetpwd');
          }

      }
  
}
