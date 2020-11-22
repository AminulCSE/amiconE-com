<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
class CustomerController extends Controller
{
    public function all_customer(){
    	$all_data = User::where('usertype', 'customer')->where('status', '1')->get();
    	return view('admin.customer.all_customer', compact('all_data'));
    }

    public function draft_customer(){
    	$all_data = User::where('usertype', 'customer')->where('status', '0')->get();
    	return view('admin.customer.draft_customer', compact('all_data'));
    }

    public function delete_draft_customer($id){
    	$get_customer = DB::table('users')->where('id', $id)->where('status', '0')->first();
    	$get_image = $get_customer->image;

    	if($get_image){
    		unlink($get_image);
    		$draft_customer = DB::table('users')->where('id', $id)->where('status', '0')->delete();
    		return back()->with('message', 'Customer deleted successfully, With image');
    	}else{
    		$draft_customer = DB::table('users')->where('id', $id)->where('status', '0')->delete();
    		return back()->with('message', 'Customer deleted successfully, Without image');
    	}


    	
    }
}
