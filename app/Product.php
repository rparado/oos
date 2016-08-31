<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';
	
	protected $fillable = [
		'category_id',
		'product_name',
		'price',
		'product_image',
		'unit'
	];
}
