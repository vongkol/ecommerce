<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class PackageTypeController extends Controller
{
    // index
    public function index()
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['package_types'] = DB::table('package_types')
                                ->where('active', 1)
                                ->orderBy('name')
                                ->get();
        return view('package_types.index', $data);
    }
    // load create form
    public function create()
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        return view('package_types.create');
    }
    // save
    public function save(Request $r)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data = array(
            'name' => $r->name
        );
        $sms = "New package type has been created successfully!";
        $sms1 = "Fail to create the new package type, please check again!";
        $i = DB::table('package_types')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/package_type/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/package_type/create')->withInput();
        }
    }
    // load edit form
    public function edit($id)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['package_type'] = DB::table('package_types')->where('id', $id)->first();
        return view('package_types.edit', $data);
    }
    public function update(Request $r)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data = array(
            'name' => $r->name
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('package_types')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/package_type/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/package_type/edit/'.$r->id);
        }
    }
    // delete package type
    public function delete($id)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        DB::table('package_types')->where('id', $id)->update(['active'=>0]);
        return redirect('/package_type');
    }
}
