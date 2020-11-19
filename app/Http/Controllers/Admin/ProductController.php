<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$slider_data = DB::table('products')->orderBy('id', 'DESC')->get();
    	return view('admin.product.all_product', compact('product_data'));
    }

    public function create(){
    	$all_cat = DB::table('categories')->where('status', '1')->orderBy('cat_name', 'ASC')->get();
    	return view('admin.product.add_product', compact('all_cat'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'product_name'	=> 'required|max:50',
	        'product_id'	=> 'required|max:15',
	        'cat_id'		=> 'required',
	        'description'	=> 'required|max:120|min:2',
	        'image1' 	  	=> 'required|image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image2' 		=> 'image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image3' 	  	=> 'image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);

	    $data = array();
    	$data['product_name']  	= $request->product_name;
    	$data['product_id']  	= $request->product_id;
    	$data['cat_id']			= $request->cat_id;
    	$data['description'] 	= $request->description;
    	$data['image1'] 	 	= $request->image1;
    	$data['image2']   		= $request->image2;
    	$data['image3']  		= $request->image3;


    	return response()->json($data);

    	$image1 = $request->file('image1');
    	$image2 = $request->file('image2');
    	$image3 = $request->file('image3');

    	if ($image1){
        	$image_name = hexdec(uniqid());
        	$ext = strtolower($image1->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$ext;
        	$upload_path = 'frontend/images/products/';
        	$image_url = $upload_path.$image_full_name;
        	$success = $image1->move($upload_path, $image_full_name);
        	$data['image1'] = $image_url;
        	DB::table('products')->insert($data);
    		return back()->with('message', 'Product Updated Success! With IMAGE-1');
        }elseif($image2){
        	$image_name2 = hexdec(uniqid());
        	$ext2 = strtolower($image2->getClientOriginalExtension());
        	$image_full_name2 = $image_name2.'.'.$ext2;
        	$upload_path2 = 'frontend/images/products/';
        	$image_url2 = $upload_path2.$image_full_name2;
        	$success2 = $image2->move($upload_path2, $image_full_name2);
        	$data['image2'] = $image_url2;
        	DB::table('products')->insert($data);
        }elseif($image3){
        	$image_name3 = hexdec(uniqid());
        	$ext3 = strtolower($image3->getClientOriginalExtension());
        	$image_full_name3 = $image_name3.'.'.$ext3;
        	$upload_path3 = 'frontend/images/products/';
        	$image_url3 = $upload_path3.$image_full_name3;
        	$success3 = $image3->move($upload_path3, $image_full_name3);
        	$data['image3'] = $image_url3;
        	DB::table('products')->insert($data);
    		return back()->with('message', 'Product Updated Success! With IMAGE-1, IMAGE-2, IMAGE-3');
        }

    }

    // public function edit($id){
	   //  $edit_slider = DB::table('sliders')->where('id', $id)->first();
	   //  return view('admin.slider.edit_slider', compact('edit_slider'));
    // }


  //   public function update(Request $request, $id){
  //   	$validatedData = $request->validate([
	 //        'title'			=> 'required|min:5',
	 //        'status'		=> 'required',
	 //        'description'	=> 'required|max:50|min:2',
	 //        'image' 	  	=> 'image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048'
  //   	]);

  //   	$update_data = array();
	 //    $update_data['title'] 			= $request->title;
	 //    $update_data['description'] 	= $request->description;
	 //    $update_data['status'] 			= $request->status;
	 //    $update_data['image']        	= $request->image;
  //       $image                 			= $request->file('image');

  //       if ($image){
  //           $image_name 		= hexdec(uniqid());
  //           $ext 				= strtolower($image->getClientOriginalExtension());
  //           $image_full_name 	= $image_name.'.'.$ext;
  //           $upload_path        = 'frontend/images/sliders/';
  //           $image_url 			= $upload_path.$image_full_name;
  //           $success 			= $image->move($upload_path, $image_full_name);
  //           $update_data['image']= $image_url;
  //           unlink($request->oldimage);
  //           DB::table('sliders')->where('id', $id)->update($update_data);
  //           return back()->with('message', 'Slider Updated Success!');
  //       }else{
  //           $update_data['image'] 	= $request->oldimage;
  //           DB::table('sliders')->where('id', $id)->update($update_data);
  //           return back()->with('message', 'Slider Updated Success! Without Image');
  //       }           
  //   }


  //   public function delete($id){
  //   	$slider_delete = DB::table('sliders')->where('id', $id)->first();
  //   	$image = $slider_delete->image;

  //   	$delete_slider = DB::table('sliders')->where('id', $id)->delete();
  //       if ($delete_slider) {
  //       	unlink($image);
  //           return back()->with('message', 'Slider Deleted Success!');
		// }
  //   }
}
