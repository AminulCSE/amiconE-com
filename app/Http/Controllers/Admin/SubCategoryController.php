<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$sub_cat_data = DB::table('sub_categories')
    					->join('categories', 'sub_categories.cat_id', '=', 'categories.id')
    					->select('sub_categories.*', 'categories.cat_name', 'categories.status')
    					->orderBy('sub_categories.id', 'DESC')->get();
    	return view('admin.category.all_sub_cat', compact('sub_cat_data'));
    }

    public function create(){
    	$all_cat = DB::table('categories')->where('status', '1')->orderBy('cat_name', 'ASC')->get();
    	return view('admin.category.add_sub_cat', compact('all_cat'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'cat_id' 		=> 'required',
	        'sub_cat_name' 	=> 'required|max:255',
	    ]);
	    $data = array();

	    $data['cat_id'] 		= $request->cat_id;
	    $data['sub_cat_name'] 	= $request->sub_cat_name;
	    $insert = DB::table('sub_categories')->insert($data);
	    return back()->with('message', 'Sub Category Inserted Success!');
    }

    public function edit($id){
    	$all_category = DB::table('categories')->get();
	    $edit_sub_cat = DB::table('sub_categories')->where('id', $id)->first();
	    return view('admin.category.edit_sub_cat', compact('edit_sub_cat', 'all_category'));
    }

    public function update(Request $request, $id){
    	$validatedData = $request->validate([
	        'cat_id' 		=> 'required',
	        'sub_cat_name' 	=> 'required',
	        'status' 		=> 'required',
	    ]);
	    $update_data = array();

	    $update_data['cat_id'] 			= $request->cat_id;
	    $update_data['sub_cat_name'] 	= $request->sub_cat_name;
	    $update_data['status'] 			= $request->status;

	    print_r($update_data);

	    $insert = DB::table('sub_categories')->where('id', $id)->update($update_data);
	    return back()->with('message', 'Sub Category Updated Success!');
    }

    public function delete($id){
	    $edit_cat = DB::table('sub_categories')->where('id', $id)->delete();
	    return back()->with('message', 'Sub Category Deleted Success!');
    }



}
