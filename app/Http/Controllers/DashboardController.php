<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
use App\User;
class DashboardController extends Controller
{
    public function dashboard(){
    	return view('website.customer_dashboard');
    }

    public function customer_edit_profile($id){
    	$get_user = DB::table('users')->where('id', $id)->first();
    	return view('website.edit_customer_profile', compact('get_user'));
    }

    public function update_customer_profile_by_img(Request $request, $id){
    	$validatedData = $request->validate([
	        'name'	=> 'required|max:50',
	        'email'	=> 'required',
	        'mobile'=> 'required',
    	]);

    	$update_data = array();
	    $update_data['name'] 			= $request->name;
	    $update_data['email'] 			= $request->email;
	    $update_data['mobile'] 			= $request->mobile;
	    $update_data['address'] 		= $request->address;
	    $update_data['image']        	= $request->image;
        $image                 			= $request->file('image');

        if($request->has('image')){
        	$old_image = $request->oldimage;
        	if ($old_image==true) {
            	 unlink($old_image);
            }


            $image_name 			= hexdec(uniqid());
            $ext 					= strtolower($image->getClientOriginalExtension());
            $image_full_name 		= $image_name.'.'.$ext;
            $upload_path        	= 'frontend/images/users/';
            $image_url 				= $upload_path.$image_full_name;
            $success 				= $image->move($upload_path, $image_full_name);
            $update_data['image']	= $image_url;

            
           
            DB::table('users')->where('id', $id)->update($update_data);
            return back()->with('message', 'User profile Updated Success!');
        }else{
            DB::table('users')->where('id', $id)->update($update_data);
            return back()->with('message', 'User Profile Updated Success! Without Image');
        }
    }


    // customer password change
    public function customer_password_update(Request $request){
    	$validatedData = $request->validate([
	        'cureent_password'		=> 'required',
	        'new_password'			=> 'required',
    	]);

    	return $request()->all();


    	if(Auth::attempt(['id'=>Auth::user()->id, 'password'=>$request->cureent_password])){
    		$user = User::find(Auth::user()->id);
    		$user->password = bcrypt($request->new_password);


    		$user->save();
    		return back()->with('message', 'Password change successfully');
    	}else{
    		return back()->with('message', 'Sorry your current password does not match');
    	}
    }
}
