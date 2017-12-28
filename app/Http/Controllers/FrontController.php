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
        $data['products'] = DB::table('products')
        ->leftjoin('photos', 'photos.product_id', 'products.id')
        ->select('products.*','photos.*')
        ->where('products.active',1)
        ->orderBy('photos.id', 'desc')
        ->paginate(8);
       
        return view('fronts.index', $data);
    }
    public function detail()
    {
        return view('fronts.detail');
    }
}
