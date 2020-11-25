<?php
use Illuminate\Support\Facades\Route;

// About us
Route::get('frontend/aboutus', 'FrontendController@aboutus');
// our service
Route::get('frontend/our_service', 'FrontendController@our_service');
// Contact us
Route::get('frontend/contact_us', 'FrontendController@contact_us');



// Frontend route---------------------------------------
Route::get('/', 'FrontendController@front_index');
Route::get('product_details/{product_id}', 'FrontendController@product_details');
Route::get('all_products', 'FrontendController@all_products');

Route::get('product_show_by_cat/{id}', 'FrontendController@product_show_by_cat');





// Cart section---------------------------------------
Route::post('add_cart', 'CartController@add_cart');
Route::get('show_cart', 'CartController@show_cart');
Route::post('update_cart', 'CartController@update_cart');
Route::get('delete_cart/{rowId}', 'CartController@delete_cart');


// Customer deshboard----------------------------------------
Route::get('customer/login', 'CheckoutController@CustomerLogin');
Route::get('customer/signup', 'CheckoutController@CustomerSignup');
Route::post('customer/signup/store', 'CheckoutController@CustomerSignupStore');
Route::get('email_verification_code', 'CheckoutController@EmailVerify');
Route::post('verify_store', 'CheckoutController@verify_store');


// Customer edit profile
Route::get('customer_edit_profile/{id}', 'DashboardController@customer_edit_profile');
Route::post('update_customer_profile_by_img/{id}', 'DashboardController@update_customer_profile_by_img');

Route::post('customer_password_update/{id}', 'DashboardController@customer_password_update');






Route::get('/home', 'HomeController@index')->name('home');
	

// Home route here
Auth::routes();

Route::group(['middleware'=>['auth', 'customer']], function(){
	Route::get('dashboard', 'DashboardController@dashboard');
	// Order table
	Route::get('order_confirm', 'OrderController@order_confirm');
	Route::get('all_order_by_customer', 'OrderController@all_order_by_customer');
	// Payment
	Route::get('payment', 'OrderController@payment');
	Route::post('payment_store', 'OrderController@payment_store');
	
});	






// -------------------------admin Middleware------------------------------------
Route::group(['middleware'=>['auth', 'admin']], function(){
	// -----------------------Admin deshboard-------------------
	Route::get('admin/index', 'Admin\AdminController@admin_index');


	// ---------------------------order route-----------------------
	Route::get('order/all_order', 'OrderController@all_order');

	// -----------------------Payment route-----------------------------
	Route::post('payment_edit', 'OrderController@payment_edit');
	Route::get('payment/all_payment', 'OrderController@all_payment');
	Route::get('payment/edit_payment/{id}', 'OrderController@edit_payment');
	Route::post('payment/update_payment/{id}', 'OrderController@update_payment');

	// -----------------------Category route-----------------------------
	Route::get('category/all_cat', 'Admin\CategoryController@index');
	Route::get('category/create_cat', 'Admin\CategoryController@create');
	Route::post('category/store_cat', 'Admin\CategoryController@store');
	Route::get('category/edit_cat/{id}', 'Admin\CategoryController@edit');
	Route::post('category/update_cat/{id}', 'Admin\CategoryController@update');
	Route::get('category/delete_cat/{id}', 'Admin\CategoryController@delete');

	// -----------------------SubCategory route-----------------------------
	Route::get('subcategory/all_sub_cat', 'Admin\SubCategoryController@index');
	Route::get('subcategory/create_sub_cat', 'Admin\SubCategoryController@create');
	Route::post('subcategory/store_sub_cat', 'Admin\SubCategoryController@store');
	Route::get('subcategory/edit_sub_cat/{id}', 'Admin\SubCategoryController@edit');
	Route::post('subcategory/update_sub_cat/{id}', 'Admin\SubCategoryController@update');
	Route::get('subcategory/delete_sub_cat/{id}', 'Admin\SubCategoryController@delete');

	// -----------------------Slider route-----------------------------
	Route::get('slider/all_slider', 'Admin\SliderController@index');
	Route::get('slider/create_slider', 'Admin\SliderController@create');
	Route::post('slider/store_slider', 'Admin\SliderController@store');
	Route::get('slider/edit_slider/{id}', 'Admin\SliderController@edit');
	Route::post('slider/update_slider/{id}', 'Admin\SliderController@update');
	Route::get('slider/delete_slider/{id}', 'Admin\SliderController@delete');

	// -----------------------Logo route-----------------------------
	Route::get('logo/all_logo', 'Admin\LogoController@index');
	Route::get('logo/create_logo', 'Admin\LogoController@create');
	Route::post('logo/store_logo', 'Admin\LogoController@store');
	Route::get('logo/edit_logo/{id}', 'Admin\LogoController@edit');
	Route::post('logo/update_logo/{id}', 'Admin\LogoController@update');
	Route::get('logo/delete_logo/{id}', 'Admin\LogoController@delete');

	// -----------------------Logo route-----------------------------
	Route::get('product/all_product', 'Admin\ProductController@index');
	Route::get('product/create_product', 'Admin\ProductController@create');
	Route::post('product/store_product', 'Admin\ProductController@store');
	Route::get('product/edit_product/{id}', 'Admin\ProductController@edit');
	Route::post('product/update_product/{id}', 'Admin\ProductController@update');
	Route::get('product/delete_product/{id}', 'Admin\ProductController@delete');

	// -----------------------Customer route-----------------------------
	Route::get('customer/all_customer', 'Admin\CustomerController@all_customer');
	Route::get('customer/draft_customer', 'Admin\CustomerController@draft_customer');
	Route::get('customer/delete_draft_customer/{id}', 'Admin\CustomerController@delete_draft_customer');
	Route::get('customer/delete_customer/{id}', 'Admin\CustomerController@delete_customer');

});