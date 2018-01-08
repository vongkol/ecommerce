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
                 return redirect('/admin/product/detail/'.md5($i));
            }
                $r->session()->flash('sms1',"Failed to insert product!");
                return redirect('/admin/product/create');
            
    }
    /*
    * @pro_detail: passed last id
    * $id:last insert id
    */
    public function pro_detail($id){
        
        
        $data['pro_detail'] = DB::select("SELECT products.id, products.name as pro_name, products.quantity, products.price, products.discount, products.model, products.description, products.short_description, products.max_price, products.min_price, categories.name as cat_name, shops.name as shop_name FROM products INNER JOIN shops ON shops.id = products.shop_id INNER JOIN categories ON categories.id = products.category_id WHERE md5(products.id) = '".$id."'");
       

            return view('products.product_detail',$data);
    }
}
