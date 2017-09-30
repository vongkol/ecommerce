<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SubscriptionController extends Controller
{
    // index
    public function index()
    {
        $data['subscriptions'] = DB::table('subscriptions')
            ->join('customers', 'subscriptions.customer_id', 'customers.id')
            ->join('packages', 'subscriptions.package_id', 'packages.id')
            ->where('subscriptions.active', 1)
            ->orderBy('subscriptions.id', 'desc')
            ->select(
                'subscriptions.*',
                'customers.first_name',
                'customers.last_name',
                'customers.email',
                'customers.phone',
                'packages.name'
            )
            ->paginate(18);
        return view('subscriptions.index', $data);
    }
    // detail
    public function detail($id)
    {
        $data['subscription'] = DB::table('subscriptions')
            ->join('customers', 'subscriptions.customer_id', 'customers.id')
            ->join('packages', 'subscriptions.package_id', 'packages.id')
            ->where('subscriptions.active', 1)
            ->select(
                'subscriptions.*',
                'customers.first_name',
                'customers.last_name',
                'customers.email',
                'customers.phone',
                'packages.name'
            )->first();
        return view('subscriptions.detail', $data);
    }
    // load create form
    public function create()
    {
        $data['packages'] = DB::table('packages')->where('active', 1)->orderBy('name')->get();
        return view('subscriptions.create', $data);
    }
    // save
    public function save(Request $r)
    {
        $package = DB::table('packages')->where('id', $r->package)->first();
        $expired_date = date('Y-m-d', strtotime("+{$package->day_number} day"));
        $data = [
            'customer_id' => $r->customer_id,
            'package_id' => $r->package,
            'expired_date' => $expired_date,
            'price' => $package->price,
            'day_number' => $package->day_number,
            'product_number' => $package->product_number
        ];
        $i = DB::table('subscriptions')->insert($data);
        if($i)
        {
            $r->session()->flash('sms', "New subscription has been create successfully!");
            return redirect('/subscription/create');
        }
        else{
            $r->session()->flash('sms1', "Cannot create new subscription!");
            return redirect('/subscription/create');
        }
    }
    // update
    public function update(Request $r)
    {
        $data = [
          'price' => $r->price,
            'day_number' => $r->day,
            'expired_date' => $r->expired_date,
            'product_number' => $r->product_number
        ];
        $i = DB::table('subscriptions')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', "All changes have been saved successfully!");
            return redirect('/subscription/edit/'.$r->id);
        }
        else{
            $r->session()->flash('sms1', "Fail to save changes. It seems you don't make any change!");
            return redirect('/subscription/edit/'.$r->id);
        }
    }
    // edit
    public function edit($id)
    {
        $data['subscription'] = DB::table('subscriptions')
            ->where('id', $id)
            ->first();
        return view('subscriptions.edit', $data);
    }
    // delete
    public function delete($id)
    {
        DB::table('subscriptions')->where('id', $id)->update(['active'=>0]);
        return redirect('/subscription');
    }
    public function approve(Request $r)
    {
        if($r->status==0)
        {
            DB::table('subscriptions')->where('id', $r->id)->update(['status'=>1]);
            $r->session()->flash('sms', "Subscription has been approved successfully!");
            return redirect('/subscription/detail/'.$r->id);
        }
        else{
            DB::table('subscriptions')->where('id', $r->id)->update(['status'=>0]);
            $r->session()->flash('sms1', "Subscription has been de-approved successfully!");
            return redirect('/subscription/detail/'.$r->id);
        }
    }
    // get expired
    public function expire(Request $r)
    {
        if ($r->from && $r->to)
        {
            $data['from'] = $r->from;
            $data['to'] = $r->to;
            $data['subscriptions'] = DB::table('subscriptions')
                ->join('customers', 'subscriptions.customer_id', 'customers.id')
                ->join('packages', 'subscriptions.package_id', 'packages.id')
                ->where('subscriptions.active', 1)
                ->whereDate('subscriptions.expired_date', '>=', $r->from)
                ->whereDate('subscriptions.expired_date', '<=', $r->to)
                ->orderBy('subscriptions.id', 'desc')
                ->select(
                    'subscriptions.*',
                    'customers.first_name',
                    'customers.last_name',
                    'customers.email',
                    'customers.phone',
                    'packages.name'
                )->get();
        }
        else{
            $m = date('m');
            $y = date('Y');
            $data['from'] ="";
            $data['to'] = "";
            $data['subscriptions'] = DB::table('subscriptions')
                ->join('customers', 'subscriptions.customer_id', 'customers.id')
                ->join('packages', 'subscriptions.package_id', 'packages.id')
                ->where('subscriptions.active', 1)
                ->whereMonth('subscriptions.expired_date', '<=', $m)
                ->whereYear('subscriptions.expired_date', '<=', $y)
                ->orderBy('subscriptions.id', 'desc')
                ->select(
                    'subscriptions.*',
                    'customers.first_name',
                    'customers.last_name',
                    'customers.email',
                    'customers.phone',
                    'packages.name'
                )->get();
        }

        return view('subscriptions.expire', $data);
    }
}
