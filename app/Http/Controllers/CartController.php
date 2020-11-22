<?php

namespace App\Http\Controllers;
use Cart;
use DB;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_cart(Request $request){
    	$validatedData = $request->validate([
	        'qty' => 'required',
    	]);
    	$product_id = $request->product_id;
    	$product = DB::table('products')->where('id', $product_id)->first();

    	if(!$product->price){
    		$price=1;
    	}else{
    		$price = $product->price;
    	}

    	Cart::add([
    		'id' => $product->id,
    		'qty' =>$request->qty,
    		'price'=>$price,
    		'name' =>$product->product_name,
    		'weight'=> 550,
    		'options' => [
    			'image1' =>$product->image1,
    			'product_code'=>$product->product_code,
    			'product_id'=>$product->id,
    		],
    	]);
    	return redirect()->to('show_cart')->with('message', 'Prodcut added success!');

    }

    // Show cart function
    public function show_cart(){
    	return view('website.show_cart');
    }

    // Update cart
    public function update_cart(Request $request){
    	$rowId = $request->rowId;
    	$qty = $request->qty;

    	Cart::update($rowId, $qty);
    	return redirect()->to('show_cart')->with('message', 'Prodcut Updated success!');
    }

    public function delete_cart($rowId){
    	Cart::remove($rowId);
    	return redirect()->to('show_cart')->with('message', 'Prodcut Deleted!');
    }
}
