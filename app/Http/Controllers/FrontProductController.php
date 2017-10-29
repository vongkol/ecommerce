<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use DateTime;
class FrontProductController extends Controller
{
    public function index(Request $r)
    {
        // check if shop owner login
        $shop_owner = $r->session()->get('shop_owner');
        if($shop_owner==NULL)
        {
             return redirect('/shop-owner/login');
        }
        $data['shop'] = DB::table('shop_owners')
            ->join('shops', 'shops.id', '=', 'shop_owners.id')
            ->where('shops.shop_owner_id', $shop_owner->id)
            ->where('shops.active',1)
            ->first();
        if($data['shop']!== null) {
            $data['products'] = DB::table('products')
                ->where('products.shop_id', $data['shop']->id)
                ->where('active',1)
                ->orderBy('id', 'desc')
                ->paginate(10);
        }
        return view('fronts.products.index', $data);
    }
    //  save new item detail
    public function saveProductImage(Request $r)
    {
        $images=array();
        if($files=$r->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $destinationPath = 'upload/product/'; // usually in public folder
                $file->move($destinationPath, $name);
                $images[]=$name;
                foreach($images as $img) {
                    $product = array (
                        'product_id' => $i,
                        'image' => $img
                    );
                }
                $p = DB::table('images')->insert($product);
                if($p) {
                    return json_encode($item);        
                }
            }
        }
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
        // check owner have shop yet
        $data['shop'] = DB::table('shops')
            ->where('shops.shop_owner_id', $shop_owner->id)
            ->where('active',1)->first();

        if($data['shop']==null) {
            return redirect('/shop-owner/shop');
        }

        $data['shop_id'] = DB::table('shops')
            ->join('shop_owners', 'shop_owners.id', '=', 'shops.id')
            ->select('shops.id')
            ->where('shops.active', 1)->first();

        $data['categories'] = DB::table('categories')
            ->where('categories.active',1)
            ->get(); 
        
        return view('fronts.products.create', $data);
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
            'shop_id' => $r->shop_id,
            'quantity' => $r->quantity,
            'price' => $r->price,
            'discount' => $r->discount,
            'model' => $r->model,
            'description' => $r->description,
            'short_description' => $r->short_description,
            'category_id' => $r->category
        );

        $sms = "The new product has been created successfully.";
        $sms1 = "Fail to create the new product, please check again!";
        $i = DB::table('products')->insertGetId($data);

        $images=array();
        if($files=$r->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $destinationPath = 'upload/product/'; // usually in public folder
                $file->move($destinationPath, $name);
                $images[]=$name;
                foreach($images as $img) {
                    $product = array (
                        'product_id' => $i,
                        'image' => $img
                    );
                }
                $p = DB::table('images')->insert($product);
            }
        }

        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/shop-owner/product');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/shop-owner/product/create')->withInput();
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
        $data['product'] = DB::table('products')->where('id', $r->id)->first();
        $data['category'] = DB::table('categories')->where('active', 1)->get();
        return view('fronts.products.edit', $data);
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
            'quantity' => $r->quantity,
            'price' => $r->price,
            'discount' => $r->discount,
            'model' => $r->model,
            'description' => $r->description,
            'short_description' => $r->short_description,
            'category_id' => $r->category
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('products')->where('id', $r->id)->update($data);
    
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/shop-owner/product');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/shop-owner/product/edit/'.$r->id);
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('products')->where('id', $id)->update(['active'=>0]);
        return redirect('/shop-owner/product');
    }

     // delete product image
     public function delete_img($id, $product_id)
     {
         DB::table('images')->where('id', $id)->update(['active'=>0]);
         return redirect('/shop-owner/product/detail/'.$product_id);
     }

     public function edit_img($id)
     {   
         $data['image'] = DB::table('images')
            ->where('images.id', $id)
            ->where('active',1)
            ->first();
         return view('fronts.products.edit_img',$data);
     }

     public function update_img(Request $r)
     {
         if($r->image)
         {
             $file = $r->file('image');
             $file_name = $file->getClientOriginalName();
             $destinationPath = 'upload/poduct/'; // usually in public folder
             $file->move($destinationPath, $file_name);
             $data['image'] = $file_name;
         }

         $sms = "All changes have been saved successfully.";
         $sms1 = "Fail to to save changes, please check again!";
         $i = DB::table('images')->where('id', $r->id)->update($data);
         if ($i)
         {
             $r->session()->flash('sms', $sms);
             return redirect('/shop-owner/product/detail/'.$r->product_id);
         }
         else
         {
             $r->session()->flash('sms1', $sms1);
             return redirect('/shop-owner/product/img/edit/'.$r->id);
         }
     }
    // view detail
    public function view($id) 
    {
        $data['product'] = DB::table('products')
            ->join('shops', 'shops.id', '=', 'products.shop_id')
            ->join('categories' , 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'shops.name as shop_name', 'categories.name as cat_name')
            ->where('products.id',$id)->first();
        $data['images'] = DB::table('images')
            ->join('products', 'products.id', '=', 'images.product_id')
            ->select('images.*','images.id as img_id')
            ->where('images.product_id', $id)
            ->where('images.active',1)
            ->get();
        return view('fronts.products.view', $data);
    }
}
