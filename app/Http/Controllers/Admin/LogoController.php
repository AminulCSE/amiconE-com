<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Logo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$logo_data = DB::table('logos')->orderBy('id', 'DESC')->get();
    	return view('admin.logo.all_logo', compact('logo_data'));
    }

    public function create(){
    	return view('admin.logo.add_logo');
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
        'image'     => 'required|image|mimes:png,PNG|max:2048',
      ]);

      $data = array();
      $data['image']      = $request->image;

      $image = $request->file('image');
        if ($image){
          $image_name = hexdec(uniqid());
          $ext = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name.'.'.$ext;
          $upload_path = 'frontend/images/logos/';
          $image_url = $upload_path.$image_full_name;
          $success = $image->move($upload_path, $image_full_name);
          $data['image'] = $image_url;
          DB::table('logos')->insert($data);
          return back()->with('message', 'Logo image insert Successfuly');

        }else{
          return back()->with('message', 'Logo image insert Successfuly');
        }
    }

    public function edit($id){
	    $edit_logo = DB::table('logos')->where('id', $id)->first();
	    return view('admin.logo.edit_logo', compact('edit_logo'));
    }


    public function update(Request $request, $id){
    	$validatedData = $request->validate([
	        'status'		=> 'required',
	        'image' 	  => 'image|mimes:png,PNG|max:2048'
    	]);

    	$update_data = array();
	    $update_data['status']   = $request->status;
	    $update_data['image']    = $request->image;

      $image                 	 = $request->file('image');
        if ($image){
            $image_name 		    = hexdec(uniqid());
            $ext 				        = strtolower($image->getClientOriginalExtension());
            $image_full_name 	  = $image_name.'.'.$ext;
            $upload_path        = 'frontend/images/logos/';
            $image_url 			    = $upload_path.$image_full_name;
            $success 			      = $image->move($upload_path, $image_full_name);
            $update_data['image']= $image_url;
            unlink($request->oldimage);
            DB::table('logos')->where('id', $id)->update($update_data);
            return back()->with('message', 'Logo Updated Success!');
        }else{
            $update_data['image'] 	= $request->oldimage;
            DB::table('logos')->where('id', $id)->update($update_data);
            return back()->with('message', 'Logo Updated Success! Without Image');
        }           
    }


    public function delete($id){
    	$logo_delete = DB::table('logos')->where('id', $id)->first();
    	$image = $logo_delete->image;

    	$delete_logo = DB::table('logos')->where('id', $id)->delete();
        if ($delete_logo) {
        	unlink($image);
          return back()->with('message', 'Logo Deleted Success!');
		}
  }
}
