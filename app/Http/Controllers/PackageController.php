<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class PackageController extends Controller
{
    // index
    public function index()
    {
        $data['packages'] = DB::table('packages')
            ->where('active',1)
            ->paginate(18);
        return view('packages.index', $data);
    }
    // load create form
    public function create()
    {
        return view('packages.create');
    }
    // save new packages
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'description' => $r->description,
            'type' => $r->type,
            'price' => $r->price,
            'number_of_product' => $r->number_of_product
        ); 
        $sms = "The new package has been created successfully.";
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
    // delete
    public function delete($id)
    {
        DB::table('packages')->where('id', $id)->update(['active'=>0]);
        return redirect('/package');
    }
    public function edit($id)
    {   
        $data['package'] = DB::table('packages')
            ->where('id', $id)->first();
        return view('packages.edit', $data);
    }
    // update partner 
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'description' => $r->description,
            'type' => $r->type,
            'price' => $r->price,
            'number_of_product' => $r->number_of_product
        );
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
}
