<?php
use Illuminate\Support\Facades\Route;


// Admin route
Route::get('admin/index', 'Admin\AdminController@admin_index');

// Frontend route
Route::get('/', 'FrontendController@front_index');
Route::get('products', 'FrontendController@product');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// -----------------------Category roue-----------------------------
Route::get('category/all_cat', 'Admin\CategoryController@index');
Route::get('category/create_cat', 'Admin\CategoryController@create');
Route::post('category/store_cat', 'Admin\CategoryController@store');
Route::get('category/edit_cat/{id}', 'Admin\CategoryController@edit');
Route::post('category/update_cat/{id}', 'Admin\CategoryController@update');
Route::get('category/delete_cat/{id}', 'Admin\CategoryController@delete');

// -----------------------SubCategory roue-----------------------------
Route::get('subcategory/all_sub_cat', 'Admin\SubCategoryController@index');
Route::get('subcategory/create_sub_cat', 'Admin\SubCategoryController@create');
Route::post('subcategory/store_sub_cat', 'Admin\SubCategoryController@store');
Route::get('subcategory/edit_sub_cat/{id}', 'Admin\SubCategoryController@edit');
Route::post('subcategory/update_sub_cat/{id}', 'Admin\SubCategoryController@update');
Route::get('subcategory/delete_sub_cat/{id}', 'Admin\SubCategoryController@delete');

// -----------------------Slider roue-----------------------------
Route::get('slider/all_slider', 'Admin\SliderController@index');
Route::get('slider/create_slider', 'Admin\SliderController@create');
Route::post('slider/store_slider', 'Admin\SliderController@store');
Route::get('slider/edit_slider/{id}', 'Admin\SliderController@edit');
Route::post('slider/update_slider/{id}', 'Admin\SliderController@update');
Route::get('slider/delete_sub_cat/{id}', 'Admin\SliderController@delete');
