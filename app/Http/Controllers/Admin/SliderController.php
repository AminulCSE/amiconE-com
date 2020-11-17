<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$slider_data = DB::table('sliders')->orderBy('id', 'DESC')->get();
    	return view('admin.slider.all_slider', compact('slider_data'));
    }

    public function create(){
    	return view('admin.slider.add_slider');
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'title'			=> 'required|min:5',
	        'description'	=> 'required|max:50|min:2',
	        'image' 	  	=> 'required|image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048'
    	]);

	    $slider = new Slider;
	    $slider->title			= $request->title;
	    $slider->description	= $request->description;
	    $image                  = $request->file('image');
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'frontend/images/sliders/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);
            $slider->image    	= $image_url;
            $slider->save();
            return back()->with('message', 'Slider Insert Success!');
    }

    public function edit($id){
	    $edit_slider = DB::table('sliders')->where('id', $id)->first();
	    return view('admin.slider.edit_slider', compact('edit_slider'));
    }

 //    public function update(Request $request, $id){
 //    	$validatedData = $request->validate([
	//         'cat_name' 	=> 'required|max:255',
	//         'status' 	=> 'required',
	//     ]);
	//     $update_data = array();

	//     $update_data['cat_name'] 	= $request->cat_name;
	//     $update_data['status'] 		= $request->status;
	//     $update_data['cat_slug'] 	= $this->sluggen($request->cat_name);
	//     $insert = DB::table('categories')->where('id', $id)->update($update_data);
	//     return back()->with('message', 'Category Updated Success!');
 //    }

 //    public function delete($id){
	//     $edit_cat = DB::table('categories')->where('id', $id)->delete();
	//     return back()->with('message', 'Category Deleted Success!');
 //    }


    public function update(Request $request, $id){
    	$validatedData = $request->validate([
	        'title'			=> 'required|min:5',
	        'status'		=> 'required',
	        'description'	=> 'required|max:50|min:2',
	        'image' 	  	=> 'image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048'
    	]);

    	$update_data = array();
	    $update_data['title'] 			= $request->title;
	    $update_data['description'] 	= $request->description;
	    $update_data['status'] 			= $request->status;
	    $update_data['image']        	= $request->image;
        $image                 			= $request->file('image');

        if ($image){
            $image_name 		= hexdec(uniqid());
            $ext 				= strtolower($image->getClientOriginalExtension());
            $image_full_name 	= $image_name.'.'.$ext;
            $upload_path        = 'frontend/images/sliders/';
            $image_url 			= $upload_path.$image_full_name;
            $success 			= $image->move($upload_path, $image_full_name);
            $update_data['image']= $image_url;
            unlink($request->oldimage);
            DB::table('sliders')->where('id', $id)->update($update_data);
            return back()->with('message', 'Slider Updated Success!');
        }else{
            $update_data['image'] 	= $request->oldimage;
            DB::table('sliders')->where('id', $id)->update($update_data);
            return back()->with('message', 'Slider Updated Success! Without Image');
        }           
    }


    

    

 //    public function sluggen($string){
	//     $string = utf8_encode($string);
	//     $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);   
	//     $string = preg_replace('/[^a-z0-9- ]/i', '', $string);
	//     $string = str_replace(' ', '-', $string);
	//     $string = trim($string, '-');
	//     $string = strtolower($string);
	//     return $string;
	// }
}
