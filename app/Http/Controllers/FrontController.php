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
        // latest products
        $data['products'] = DB::table('products')
        ->leftjoin('photos', 'photos.product_id', 'products.id')
        
        ->where('products.active',1)
        ->orderBy('products.id', 'desc')
        ->select('products.*','photos.*')
        ->paginate(18);
        // feature products
        $data['features'] = DB::table('products')
        ->leftjoin('photos', 'photos.product_id', 'products.id')
        
        ->where('products.active',1)
        ->where('products.is_featured', 1)
        ->orderBy('products.id', 'desc')
        ->select('products.*','photos.*')
        ->paginate(18);
        return view('fronts.index', $data);
    }
    public function detail()
    {
        return view('fronts.detail');
    }
}
