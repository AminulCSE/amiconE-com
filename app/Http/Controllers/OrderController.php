<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    public function order_confirm(Request $request){
    	foreach ($request->product_id as $id) {
        $data[]=[
            "product_id"=>$id,
            "qty"  		=>$request->qty[$id],
            "total_price"    	=>$request->total_price[$id],
            "user_id" 	=>$request->user_id[$id],
            ];
        }

        $insert = DB::table('orders')->insert($data);
            if ($insert){
                return 'ok';
            }


    }
}


