<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class FrontShopController extends Controller
{
    public function index(Request $r)
    {
        // check if shop owner login
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
             return redirect('/shop-owner/login');
        }
        $data['shop'] = DB::table('shops')
            ->where('shops.shop_owner_id', $shop_owner->id)
            ->where('active',1)->first();

        return view('fronts.shop.index', $data);
    }
    // load create form
    public function create(Request $r)
    {
        // check if shop owner login
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
             return redirect('/shop-owner/login');
        }
        return view('fronts.shop.create');
    }
    // save new company
    public function save(Request $r)
    {
        // check if shop owner login
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
             return redirect('/shop-owner/login');
        }
        $data = array(
            'name' => $r->name,
            'description' => $r->description,
            'address' => $r->address,
            'contact_person' => $r->contact_person,
            'phone' => $r->phone,
            'email' => $r->email,
            'payment' => $r->payment,
            'shop_owner_id' => $shop_owner->id
        );
        if($r->logo)
        {
            $file = $r->file('logo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'upload/company'; // usually in public folder
            $file->move($destinationPath, $file_name);
            $data['logo'] = $file_name;
        }
        $sms = "The new company has been created successfully.";
        $sms1 = "Fail to create the new company, please check again!";
        $i = DB::table('shops')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/shop-owner/shop');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/company/shop/create')->withInput();
        }
    }

    public function edit(Request $r)
    {
        // check if shop owner login
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
             return redirect('/shop-owner/login');
        }
        $data['shop'] = DB::table('shops')->where('shop_owner_id', $shop_owner->id)->first();
        return view('fronts.shop.edit', $data);
    }

    public function update(Request $r)
    {
       // check if shop owner login
       $shop_owner = $r->session()->get('shop_owner');
       if($shop_owner==NULL)
       {
            return redirect('/shop-owner/login');
       }
        $data = array(
            'name' => $r->name,
            'description' => $r->description,
            'address' => $r->address,
            'contact_person' => $r->contact_person,
            'phone' => $r->phone,
            'email' => $r->email,
            'payment' => $r->payment
        );
        if($r->logo)
        {
            $file = $r->file('logo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'upload/company/'; // usually in public folder
            $file->move($destinationPath, $file_name);
            $data['logo'] = $file_name;
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('shops')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/shop-owner/shop');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/shop-owner/shop/edit');
        }
    }
}
