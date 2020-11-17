<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function front_index(){
    	return view('website.home');
    }

    public function product(){
    	return view('website.product');
    }
}
