<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function index()
	{
		$categories = Category::all();
		return \View::make('admin/category/items', compact('categories'));
	}
	public function create()
	{
		return \View::make('admin/category/index');
	}
	public function store(Request $request)
	{
		$this->validate($request, [
			'category_name' => 'required',
		]);
		
		$input['category_name'] = Input::get('category_name');
		
		//set Rules for validation
		$rules = array(
			'category_name' => 'required:tbl_category,category_name'
		);
		
		$validator = Validator::make($input, $rules);
		 
		if ($validator->fails()) {
		   return redirect('admin/category/index')->withInput()->withErrors($validator);
		} else {
			$cat_name = $request->all();
			Category::create($cat_name);
			
			Session::flash('cat_message', 'category name successfully created');
		    return redirect()->back();
		}
	}
	public function edit($id)
	{
		$category = Category::find($id);
		return \View::make('admin/category/update', compact('category'));
	}
	public function update(Request $request, $id)
	{
		$categoryUpdate = $request->all();
		$category = Category::find($id);
		$category->update($categoryUpdate);
		Session::flash('category_updated', 'Category has been update');
		return redirect()->back();
	}
	public function destroy($id)
	{
		Category::find($id)->delete();
		return redirect('admin/category');
	}
}
