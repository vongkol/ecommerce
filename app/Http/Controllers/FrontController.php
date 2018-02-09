<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FrontController extends Controller
{
    // index
    public function index()
    {
        $data['categories'] = DB::table('categories')->where('active',1)->where('parent_id',0)->paginate(12);
        // latest products
        $data['products'] = DB::table('products')
        ->leftJoin('photos', 'photos.product_id', 'products.id')
        
        ->where('products.active',1)
        ->where('photos.is_front', 1)
        ->orderBy('products.id', 'desc')
        ->select('products.*','photos.file_name')
        ->paginate(18);
        // feature products
        $data['features'] = DB::table('products')
        ->leftjoin('photos', 'photos.product_id', 'products.id')
        ->where('products.active',1)
        ->where('products.is_featured', 1)
        ->where('photos.is_front', 1)
        ->orderBy('products.id', 'desc')
        ->select('products.*','photos.file_name')
        ->get();
        // discount products
        $data['discounts'] = DB::table('products')
        ->leftjoin('photos', 'photos.product_id', 'products.id')
        ->where('products.active',1)
        ->where('photos.is_front', 1)
        ->where('products.discount', '>', 1)
        ->select('products.*','photos.file_name')
        ->paginate(18);
        return view('fronts.index', $data);
    }
    public function detail($id)
    {
        $data['product'] = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as category_name')
            ->first();
        if($data['product']!=null)
        {
            $data['photos'] = DB::table('photos')->where('product_id', $data['product']->id)->get();
            $data['shop'] = DB::table('shops')->where('id', $data['product']->shop_id)->first();
            // related products
            $data['products'] = DB::table('products')
            ->leftJoin('photos', 'photos.product_id', 'products.id')
            ->where('products.active',1)
            ->where('photos.is_front', 1)
            ->where('products.category_id', $data['product']->category_id)
            ->where('products.id',"!=", $id)
            ->select('products.*','photos.file_name')
            ->paginate(6);
        }

        return view('fronts.detail', $data);
    }
}
