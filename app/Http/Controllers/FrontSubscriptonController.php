<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use phpDocumentor\Reflection\Types\Null_;
use Session;
class FrontSubscriptonController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
           app()->setLocale(Session::get("lang"));
            return $next($request);
        });
    }
    public function subscription(Request $r) {
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
            return redirect('/employer/login');
        }
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
        return view('fronts.shop_owner.subscription', $data);
    }

    public function unsubscribe(Request $r)
    {
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
            return redirect('/shop_owner/login');
        }
        $i = DB::table('subscriptions')->where('id', $r->id)->update(['active'=>0]);
        if($i)
        {
            if ($r->session()->get('lang')=='en') {

                $r->session()->flash('sms', "You have unsubscribed successfully!");
                # code...
            } else {

                $r->session()->flash('sms', "អ្នកបានបញ្ឈប់គម្រោងដោយជោគជ័យ!");
                # code...
            }
            
            return redirect('/show-owner/subscription');
        }
    }
    // subscribe
    public function subscribe(Request $r)
    {
        $shop_owner = $r->session()->get('shop_owner');
        if($employer==NULL)
        {
            return redirect('/shop-owner/login');
        }
        // check if employer has any subscription
        $counter = DB::table('subscriptions')
            ->where('active', 1)
            ->where('shop_owner_id', $r->session()->get('shop_owner')->id)
            ->count();
        if ($counter>0)
        {
            if ($r->session()->get('lang')=='en') {

                $r->session()->flash('sms1', "Please unsubscribe the current package first before you subscribe a new package!");
                # code...
            } else {

                $r->session()->flash('sms1', "មុននឹងទិញគម្រោងថ្មី សូមអ្នកបញ្ឈប់គម្រោងបច្ចុប្បន្នរបស់អ្នកជាមុនសិន!");
                # code...
            }
            
            return redirect('/shop-owner/subscription');
        }
        $package = DB::table('packages')->where('id', $r->package)->first();
        $expired_date = date('Y-m-d', strtotime("+{$package->day_number} day"));
        $data = [
            'shop_owner_id' => $r->session()->get('shop_owner')->id,
            'package_id' => $r->package,
            'expired_date' => $expired_date,
            'price' => $package->price,
            'day_number' => $package->day_number,
            'product_number' => $package->job_number,
        ];
        $i = DB::table('subscriptions')->insert($data);
        if($i)
        {
            if ($r->session()->get('lang')=='en') {

                $r->session()->flash('sms', "You have subscribed successfully!");
                # code...
            } else {

                $r->session()->flash('sms', "អ្នកបានទិញគម្រោងថ្មីដោយជោគជ័យ!");
                # code...
            }

            return redirect('/shop-owner/subscription');
        }
        else{
            if ($r->session()->get('lang')=='en') {

                $r->session()->flash('sms1', "Fail to make new subscription!");
                # code...
            } else {

                $r->session()->flash('sms1', "មិនអាចទិញគម្រោងថ្មីបានទេ!");
                # code...
            }
            
            return redirect('/shop-owner/subscription');
        }
    }
}
