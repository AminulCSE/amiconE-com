<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin_index(){
    	$order = DB::table('orders')->get();
    	$row_order = count($order);

    	$products = DB::table('products')->get();
    	$row_products = count($products);

    	$cat = DB::table('categories')->get();
    	$categories = count($cat);

    	$customer = DB::table('users')
    			->where('usertype','customer')
    			->get();
    	$customers = count($customer);
    	return view('admin.admin_index', compact('row_order','row_products', 'categories', 'customers'));
    }
}
