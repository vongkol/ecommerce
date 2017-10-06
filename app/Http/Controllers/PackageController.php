<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class PackageController extends Controller
{
    // index
    public function index()
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['packages'] = DB::table('packages')->where('active', 1)->orderBy('name')->get();
        return view('packages.index', $data);
    }
    // load create form
    public function create()
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['package_types'] = 
            DB::table('package_types')->where('active', 1)->orderBy('name')->get();
        return view('packages.create', $data);
    }
    public function save(Request $r)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data = [
            'name' => $r->name,
            'type' => $r->type,
            'description' => $r->description,
            'price' => $r->price,
            'product_number' => $r->product_number,
            'day_number' => $r->day
        ];
        $sms = "New package has been created successfully!";
        $sms1 = "Fail to create the new package, please check again!";
        $i = DB::table('packages')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/package/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/package/create')->withInput();
        }
    }
    // load edit form
    public function edit($id)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['package'] = DB::table('packages')->where('id', $id)->first();
        $data['package_types'] = DB::table('package_types')->where('active', 1)->orderBy('name')->get();
        return view('packages.edit', $data);
    }
    public function update(Request $r)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data = [
            'name' => $r->name,
            'type' => $r->type,
            'description' => $r->description,
            'price' => $r->price,
            'product_number' => $r->product_number,
            'day_number' => $r->day
        ];
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('packages')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/package/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/package/edit/'.$r->id);
        }
    }
    // delete package
    public function delete($id)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        DB::table('packages')->where('id', $id)->update(['active'=>0]);
        return redirect('/package');
    }
}
