<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$cat_data = DB::table('categories')->orderBy('id', 'DESC')->get();
    	return view('admin.category.all_cat', compact('cat_data'));
    }

    public function create(){
    	return view('admin.category.add_cat');
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'cat_name' => 'required|unique:categories|max:255',
	    ]);
	    $data = array();

	    $data['cat_name'] = $request->cat_name;
	    $data['cat_slug'] = $this->sluggen($request->cat_name);
	    $insert = DB::table('categories')->insert($data);
	    return back()->with('message', 'Category Insert Success!');
    }

    public function edit($id){
	    $edit_cat = DB::table('categories')->where('id', $id)->first();
	    return view('admin.category.edit_cat', compact('edit_cat'));
    }

    public function update(Request $request, $id){
    	$validatedData = $request->validate([
	        'cat_name' 	=> 'required|max:255',
	        'status' 	=> 'required',
	    ]);
	    $update_data = array();

	    $update_data['cat_name'] 	= $request->cat_name;
	    $update_data['status'] 		= $request->status;
	    $update_data['cat_slug'] 	= $this->sluggen($request->cat_name);
	    $insert = DB::table('categories')->where('id', $id)->update($update_data);
	    return back()->with('message', 'Category Updated Success!');
    }

    public function delete($id){
	    $edit_cat = DB::table('categories')->where('id', $id)->delete();
	    return back()->with('message', 'Category Deleted Success!');
    }


    

    

    public function sluggen($string){
	    $string = utf8_encode($string);
	    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);   
	    $string = preg_replace('/[^a-z0-9- ]/i', '', $string);
	    $string = str_replace(' ', '-', $string);
	    $string = trim($string, '-');
	    $string = strtolower($string);
	    return $string;
	}
}
