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
}
