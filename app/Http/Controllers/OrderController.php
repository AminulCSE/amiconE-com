<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Order;
use Cart;
use Auth;
class OrderController extends Controller
{
    public function order_confirm(Request $request){

    	if (Cart::content()->count()!=0) {
    		foreach(Cart::content() as $row) {
			$data[]=[
            "user_id"			=>Auth::user()->id,
            "order_id"			=>uniqid(),
            "qty" 				=>$row->qty,
            "product_id"		=>$row->id,
            "total_price"   	=>$row->price,
            ];
		}

		$insert = DB::table('orders')->insert($data);
            if ($insert){
            	Cart::destroy();
               return redirect()->to('payment')->with('message', 'Order Complete added success!');
           	}
    	}
    }


    public function all_order_by_customer(){
         $data = DB::table('orders')
                ->join('products', 'orders.product_id', 'products.id')
                ->where('user_id', @Auth::user()->id)
                ->select('products.*', 'orders.*')
                ->get();
        return view('website.all_order_by_customer', compact('data'));
    }



    public function payment(){
    	return view('website.payment');
    }




// here is admin panel function -------------------------------------

    public function all_order(){
        $data = DB::table('orders')
                ->join('users', 'orders.user_id', 'users.id')
                ->join('payments', 'orders.user_id', 'payments.user_id')
                ->join('products', 'orders.product_id', 'products.id')
                ->select('orders.*', 'users.name', 'users.mobile', 'users.email', 'products.*','payments.status as payment_status')
                ->get();
        return view('admin.order.all_order', compact('data'));
    }



    public function payment_store(Request $request){
    	$validatedData = $request->validate([
	        'bkash_number'	 	=> 'required',
	        'payment_bkash_code'=> 'required',
	        'amount_paid' 		=> 'required',
    	]);

    	$data = array();
	    $data['bkash_number'] 		= $request->bkash_number;
	    $data['payment_bkash_code'] = $request->payment_bkash_code;
	    $data['paid'] 				= $request->amount_paid;
	    $data['user_id'] 			= $request->user_id;

	    $insert = DB::table('payments')->insert($data);
	    return redirect()->to('payment')->with('message', 'Bkash number and code send!!');
    }

    public function all_payment(){
    	$data = DB::table('payments')
    			->join('users', 'payments.user_id', 'users.id')
    			->select('payments.*', 'users.name', 'users.email')
    			->get();
    	return view('admin.bkash payment.all_payment', compact('data'));
    }


    public function edit_payment($id){
    	$data = DB::table('payments')
    			->where('id', $id)
    			->first();
    	return view('admin.bkash payment.payment_edit', compact('data'));
    }

    public function update_payment(Request $request, $id){
    	$validatedData = $request->validate([
	        'bkash_number'	 	=> 'required',
	        'payment_bkash_code'=> 'required',
	        'paid' 		=> 'required',
    	]);

    	$data = array();
	    $data['bkash_number'] 		= $request->bkash_number;
	    $data['payment_bkash_code'] = $request->payment_bkash_code;
	    $data['paid'] 				= $request->paid;
	    $data['status'] 			= $request->status;

	    $insert = DB::table('payments')->where('id', $id)->update($data);
	    return redirect()->back()->with('message', 'Bkash number updated!!');
    }
}
        