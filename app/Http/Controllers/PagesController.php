<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function admin_dashboard()
	{
		return view('admin.dashboard.index');
	}
	 public function create_category()
	{
		return view('admin.product.index');
	}
}
