<?php

namespace App\Http\Controllers;
use Cart;
use DB;
use Mail;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CustomerLogin(){
    	return view('website.customer_login');
    }

    public function CustomerSignupStore(Request $request){
    	DB::transaction(function()use($request) {
    		$validatedData = $request->validate([
		        'name' 				=> 'required|max:255',
		        'email' 			=> 'required|unique:users,email',
		        'mobile'			=> 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
		        'password' 			=> 'required',
				'confirmation_password' => 'required_with:confirmation_password|same:password'
		    ]);

    		$code = rand(0000, 9999);
    		$user = new User();
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->mobile = $request->mobile;
    		$user->code = $code;
    		$user->status = '0';
    		$user->usertype = 'customer';
    		$user->password = bcrypt($request->password);
    		$user->save();

    		$data = array(
    			'email' => $request->email,
    			'code' => $code,
    		);

    		Mail::send('website.email.varify_email', $data, function($message)use($data){
    			$message->from('pealrana63@gmail.com', 'Amicon plus');
    			$message->to($data['email']);
    			$message->subject('Please varified your email address');
    		});
    	});
    	return redirect()->to('email_verification_code')->with('message', 'You are succefully signup, please varify email');
    }


    public function EmailVerify(){
    	return view('website.email.email_verify');
    }

    public function verify_store(Request $request){
        $validatedData = $request->validate([
                'email' => 'required',
                'code'  => 'required',
            ]);

        $checkData = User::where('email', $request->email)->where('code', $request->code)->first();
        if ($checkData) {
            $checkData->status = '1';
            $checkData->save();
            return redirect()->to('customer/login')->with('message', 'You have succefully Verified, Please login');
        }else{
            return redirect()->back()->with('message', 'Sorry! Email and Verification code Does not match!');
        }
    }
}
