<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Product;
use Session;
class ProductController extends Controller
{
    public function index()
	{
		//return \View::make('admin/product');
	}
	public function create()
	{
		$category =  [''=>''] + Category::lists('category_name', 'id')->all();
		return \View::make('admin/product/index', compact('category'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
			'product_name' => 'required',
			'product_image' => 'max:300|mimes:jpg,png,gif,jpeg,JPG',
			'price' => 'required',
			'unit' => 'required',
		]);
		
		$input['product_name'] = Input::get('product_name');
		$input['product_image'] = Input::file('product_image');
		$input['price'] = Input::get('price');
		$input['unit'] = Input::get('unit');
		$input['category_id'] = Input::get('category_id');
		
		//set Rules for validation
		$rules = array(
			'product_name' => 'unique:tbl_product,product_name',
			'product_image' => 'required:tbl_product,product_image',
			'price' => 'required:tbl_product,price',
			'unit' => 'required:tbl_product,unit',
			'category_id' => 'required:tbl_category,category_id',

		);
		
		$validator = Validator::make($input, $rules);
		
		if ($validator->fails()) {
		   return redirect('admin/product/index')->withInput()->withErrors($validator);
		}
		else {

			$product = new Product($request->except('product_image'));
			
			$picture = "";
			if ($request->hasFile('product_image')) {
				$file = $request->file('product_image');
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$picture = $filename;
			}
			$product->product_image = $picture;
			

			if ($request->hasFile('product_image')) {
				$destinationPath = public_path() . '/product_image/';
				$request->file('product_image')->move($destinationPath, $picture);
			}

			$product->save();

    		Session::flash('product_message','Product successfully saved.');
		    return redirect()->back();
		}
	}
	public function edit(Request $request)
	{
		
	}
	public function update($id)
	{
		
	}
	public function delete($id)
	{
		
	}
}
