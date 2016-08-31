<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_orders';
	protected $fillable = [
		'user_id',
		'product_id',
		'quantity',
		'amount',
		'status',
		'when_needed'
	];
}
