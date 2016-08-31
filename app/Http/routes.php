<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(array('before' => 'auth', 'middleware' => 'web'), function(){
	Route::auth();
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/admin/dashboard', 'PagesController@admin_dashboard');
	Route::get('/admin/category/index', 'Admin\CategoryController@create');
	Route::get('/admin/product/index', 'Admin\ProductController@create');
	Route::get('admin/orders', 'Admin\OrderController@show');
});
Route::resource('/admin/category', 'Admin\CategoryController');
Route::resource('/admin/product', 'Admin\ProductController');
Route::resource('/admin/order', 'Admin\OrderController');


