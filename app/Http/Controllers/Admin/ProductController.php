<?php

namespace App\Http\Controllers\Admin;
use DB;
use Image;
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
    	$all_products = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->select('products.*', 'categories.cat_name')
            ->get();
    	return view('admin.product.all_product', compact('all_products'));
    }

    public function create(){
    	$all_cat = DB::table('categories')->where('status', '1')->orderBy('cat_name', 'ASC')->get();
    	return view('admin.product.add_product', compact('all_cat'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'product_name'	=> 'required|max:50',
	        'product_code'	=> 'required|max:15',
	        'cat_id'		=> 'required',
	        'price'			=> 'max:20',
	        'description'	=> 'required|max:120|min:2',
	        'image1' 	  	=> 'required|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image2' 		=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image3' 	  	=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);

    	$data = array();
	    $data['product_name'] 	= $request->product_name;
	    $data['product_code'] 	= $request->product_code;
	    $data['cat_id'] 		= $request->cat_id;
	    $data['price'] 			= $request->price;
	    $data['product_slug'] 	= strtolower(str_replace(' ', '-', $request->product_name));
	    $data['description'] 	= $request->description;

    	if($request->has('image1') && $request->has('image2') && $request->has('image3')){
    	$img1 		= $request->file('image1');
	    $name_gen 	= hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
	    Image::make($img1)->resize(700,700)->save('frontend/images/products/'.$name_gen);
	    $img_url1 	= 'frontend/images/products/'.$name_gen;

	    $img2 		= $request->file('image2');
	    $name_gen 	= hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
	    Image::make($img2)->resize(700,700)->save('frontend/images/products/'.$name_gen);
	    $img_url2 	= 'frontend/images/products/'.$name_gen;

	    $img3 		= $request->file('image3');
	    $name_gen 	= hexdec(uniqid()).'.'.$img3->getClientOriginalExtension();
	    Image::make($img3)->resize(700,700)->save('frontend/images/products/'.$name_gen);
	    $img_url3 	= 'frontend/images/products/'.$name_gen;

	    $data['image1'] 		= $img_url1;
	    $data['image2'] 		= $img_url2;
	    $data['image3'] 		= $img_url3;
		
	    $product_insert = DB::table('products')->insert($data);
	    return back()->with('message', 'Product Inserted Successfully! With 3 Images');
		}

		if($request->has('image1') && $request->has('image2')){
    	$img1 		= $request->file('image1');
	    $name_gen 	= hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
	    Image::make($img1)->resize(700,700)->save('frontend/images/products/'.$name_gen);
	    $img_url1 	= 'frontend/images/products/'.$name_gen;

	    $img2 		= $request->file('image2');
	    $name_gen 	= hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
	    Image::make($img2)->resize(700,700)->save('frontend/images/products/'.$name_gen);
	    $img_url2 	= 'frontend/images/products/'.$name_gen;

	    $data['image1'] 		= $img_url1;
	    $data['image2'] 		= $img_url2;
		
	    $product_insert = DB::table('products')->insert($data);
	    return back()->with('message', 'Product Inserted Successfully! With 2 Images');
		}


		if($request->has('image1')){
    	$img1 		= $request->file('image1');
	    $name_gen 	= hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
	    Image::make($img1)->resize(700,700)->save('frontend/images/products/'.$name_gen);
	    $img_url1 	= 'frontend/images/products/'.$name_gen;

	    $data['image1'] 		= $img_url1;

	    $product_insert = DB::table('products')->insert($data);
	    return back()->with('message', 'Product Inserted Successfully! With 1 Image');
		}


	}

    public function edit($id){
    	$all_cat 		= DB::table('categories')->get();
	    $edit_product 	= DB::table('products')->where('id', $id)->first();
	    return view('admin.product.edit_product', compact('edit_product', 'all_cat'));
    }



    public function update(Request $request, $id){
    	$validatedData = $request->validate([
	        'product_name'	=> 'required|max:50',
	        'product_code'	=> 'required|max:15',
	        'cat_id'		=> 'required',
	        'price'			=> 'max:20',
	        'description'	=> 'required|max:120|min:2',
	        'image1' 	  	=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image2' 		=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image3' 	  	=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);

    	$data = array();
	    $data['product_name'] 	= $request->product_name;
	    $data['product_code'] 	= $request->product_code;
	    $data['cat_id'] 		= $request->cat_id;
	    $data['price'] 			= $request->price;
	    $data['product_slug'] 	= strtolower(str_replace(' ', '-', $request->product_name));
	    $data['description'] 	= $request->description;

		$old_img1 	= $request->old_img1;
		$old_img2 	= $request->old_img2;
		$old_img3 	= $request->old_img3;


		if($request->has('image1') && $request->has('image2') && $request->has('image3')){
			if($old_img1 && $old_img2 && $old_img3){
				unlink($old_img1);
				unlink($old_img2);
				unlink($old_img3);
			}

			$img1 = $request->file('image1');
		    $name_gen = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
		    Image::make($img1)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url1 = 'frontend/images/products/'.$name_gen;
		    $data['image1'] = $img_url1;

		    $img2 = $request->file('image2');
		    $name_gen = hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
		    Image::make($img2)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url2 = 'frontend/images/products/'.$name_gen;
		    $data['image2'] = $img_url2;

		    $img3 = $request->file('image3');
		    $name_gen = hexdec(uniqid()).'.'.$img3->getClientOriginalExtension();
		    Image::make($img3)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url3 = 'frontend/images/products/'.$name_gen;

		    $data['image3'] = $img_url3;

	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, With Image One, Two, Three');
		}


		if($request->has('image1') && $request->has('image2')){
			if($old_img2 && $old_img2){
				unlink($old_img1);
				unlink($old_img2);
			}

			$img1 = $request->file('image1');
		    $name_gen = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
		    Image::make($img1)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url1 = 'frontend/images/products/'.$name_gen;
		    $data['image1'] = $img_url1;

		    $img2 = $request->file('image2');
		    $name_gen = hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
		    Image::make($img2)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url2 = 'frontend/images/products/'.$name_gen;
		    $data['image2'] 		= $img_url2;

	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, With Image One, two');
		}


		if($request->has('image2') && $request->has('image3')){
			if($old_img2 && $old_img3){
				unlink($old_img2);
				unlink($old_img3);
			}

			$img2 = $request->file('image2');
		    $name_gen = hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
		    Image::make($img2)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url2 = 'frontend/images/products/'.$name_gen;
		    $data['image2'] = $img_url2;

		    $img_one3 = $request->file('image3');
		    $name_gen = hexdec(uniqid()).'.'.$img_one3->getClientOriginalExtension();
		    Image::make($img_one3)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url3 = 'frontend/images/products/'.$name_gen;
		    $data['image3'] 		= $img_url3;

	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, With Image Two, Three');
		}





		if($request->has('image1')){
			if($old_img1){
				unlink($old_img1);
			}

			$img1 = $request->file('image1');
		    $name_gen = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
		    Image::make($img1)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url1 = 'frontend/images/products/'.$name_gen;
		    $data['image1'] = $img_url1;

	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, With Image One');
		}

		if($request->has('image2')){
			if($old_img2){
				unlink($old_img2);
			}

	    	$img_one2 = $request->file('image2');
		    $name_gen = hexdec(uniqid()).'.'.$img_one2->getClientOriginalExtension();
		    Image::make($img_one2)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url2 = 'frontend/images/products/'.$name_gen;

		    $data['image2'] 		= $img_url2;
	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, Image two');
		}

		if($request->has('image3')){
			if($old_img3){
				unlink($old_img3);
			}

	    	$img_one3 = $request->file('image3');
		    $name_gen = hexdec(uniqid()).'.'.$img_one3->getClientOriginalExtension();
		    Image::make($img_one3)->resize(700,700)->save('frontend/images/products/'.$name_gen);
		    $img_url3 = 'frontend/images/products/'.$name_gen;

		    $data['image3'] 		= $img_url3;
	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, Image Three');
		}

		if(!$request->has('image1') && !$request->has('image2') && !$request->has('image3')){
			DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, Without Image');
		}
	}



	public function delete($id){
        $del_product = DB::table('products')->where('id', $id)->first();
        $image1 = $del_product->image1;
        $image2 = $del_product->image2;
        $image3 = $del_product->image3;

        $del_pro = DB::table('products')->where('id', $id)->delete();
        if ($del_pro) {
        	if($image1 && $image2 && $image3){
				unlink($image1);
	            unlink($image2);
	            unlink($image3);
			}
            return back()->with('message', 'Product Deleted Successfully! With image');
        }
    }

}
