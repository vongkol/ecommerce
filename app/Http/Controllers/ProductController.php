<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['products'] = DB::table('products')
            ->join('categories', "products.category_id", "categories.id")
            ->where("products.active", 1)
            ->select("products.*", "categories.name as category_name")
            ->paginate(18);
        return view('products.index', $data);
    }
    public function create()
    {
        $data['categories'] = DB::table('categories')->where('active', 1)->orderBy('name')->get();
        $data['shops'] = DB::table('shops')->where('active',1)->orderBy('name')->get();
        return view('products.create', $data);
    }

    public function save(Request $r)
    {
            $i = "";
            $data = array(
                'name' => $r->name,
                'shop_id' => $r->shop,
                'quantity' => $r->quantity,
                'price' => $r->price,
                'discount' => $r->discount,
                'model' => $r->model,
                'description' => $r->description,
                'short_description' => $r->short_description,
                'category_id' => $r->category,
                'min_price' => $r->min_price,
                'max_price' => $r->max_price
            );

            // if ($r->has('btn_save')) {
                // get last id with insert
                $i = DB::table('products')->insertGetId($data);
            // }

            if($i){
                $r->session()->flash('sms', "Product has been inserted successfully!");
                 return redirect('/admin/product/detail/'.$i);
            }
                $r->session()->flash('sms1',"Failed to insert product!");
                return redirect('/admin/product/create');
            
    }
    /*
    * @pro_detail: passed last id
    * $id:last insert id
    */
    public function pro_detail($id)
    {
        $data['product'] = DB::table('products')->where('id', $id)->first();
        $data['categories'] = DB::table('categories')->where('active', 1)->orderBy('name')->get();
        $data['shops'] = DB::table('shops')->where('active', 1)->orderBy('name')->get();
        return view('products.product_detail',$data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'model' => $r->model,
            'category_id' => $r->category,
            'shop_id' => $r->shop,
            'quantity' => $r->quantity,
            'min_price' => $r->min_price,
            'price' => $r->price,
            'max_price' => $r->max_price,
            'short_description' => $r->short_description,
            'description' => $r->description
        );
        $i = DB::table('products')->where('id', $r->id)->update($data);

        $r->session()->flash('sms', "All changes have saved successfully!");
        return redirect('/admin/product/detail/'.$r->id);

    }
}
