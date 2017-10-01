<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class CompanyController extends Controller
{
    // index
    public function index()
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['companys'] = DB::table('shops')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('companys.index', $data);
    }
    // load create form
    public function create()
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        return view('companys.create');
    }
    // save new company
    public function save(Request $r)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data = array(
            'name' => $r->name,
            'description' => $r->description,
            'address' => $r->address,
            'contact_person' => $r->contact_person,
            'phone' => $r->phone,
            'email' => $r->email,
            'payment' => $r->payment,
            'customer_id' => Auth::user()->id
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
            return redirect('/company/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/company/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        DB::table('shops')->where('id', $id)->update(['active'=>0]);
        return redirect('/company');
    }

    public function edit($id)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['company'] = DB::table('shops')->where('id', $id)->first();
        return view('companys.edit', $data);
    }
    public function update(Request $r)
    {
        if(Auth::user()==null)
        {
            return redirect("/login");
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
            return redirect('/company/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/company/edit/'.$r->id);
        }
    }
    // view detail
    public function view($id) 
    {
        $data['company'] = DB::table('shops')
            ->where('id',$id)->first();
        return view('companys.view', $data);
    }
}
