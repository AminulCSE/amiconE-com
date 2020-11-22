<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function front_index(){
    	$category = DB::table('categories')
    				->where('status', '1')
    				->get();
    	// $sub_cat = DB::table('sub_categories')->where('status', '1')->get();
    	$slider = DB::table('sliders')->where('status', '1')->get();
    	return view('website.home', compact('category', 'slider'));
    }



    public function product_details($product_id){
        $product_details = DB::table('products')
                            ->where('id', $product_id)
                            ->where('status', '1')
                            ->select('products.*')
                            ->first();
    	return view('website.product_details', compact('product_details'));
    }

    public function all_products(){
        $all_cat        = DB::table('categories')->where('status', '1')->get();
        $all_products   = DB::table('products')->paginate(10);
        return view('website.all_products', ['all_productss' => $all_products], compact('all_cat'));
    }


    // About us
    public function aboutus(){
        return view('website.about_us');
    }

    // About us
    public function our_service(){
        return view('website.our_service');
    }

    // Contact us
    public function contact_us(){
        return view('website.contact_us');
    }


    // products show by categories id
    public function product_show_by_cat($id){
        $products_by_cat_id   = DB::table('products')->where('cat_id', $id)->paginate(5);
         return view('website.product_show_by_category', ['all_productss' => $products_by_cat_id], compact('products_by_cat_id'));
    }
}
