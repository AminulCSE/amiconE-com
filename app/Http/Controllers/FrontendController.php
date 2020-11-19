<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function front_index(){
    	$category = DB::table('categories')
    				->where('categories.status', '1')
    				->get();
    	$sub_cat = DB::table('sub_categories')->where('status', '1')->get();
    	$slider = DB::table('sliders')->where('status', '1')->get();
    	return view('website.home', compact('category', 'sub_cat', 'slider'));
    }

    public function product(){
    	return view('website.product');
    }
}
