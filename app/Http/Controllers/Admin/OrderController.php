<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use DB;
use Session;
use Mail;
use SMS;
use Twilio;
class OrderController extends Controller
{
    public function index()
	{
		
	}
	public function create()
	{
		
	}
	public function store()
	{
		
	}
	public function edit($id)
	{
		$orders_edit = DB::table('tbl_orders')
			->join('users', 'tbl_orders.user_id', '=', 'users.id')
			->join('tbl_product', 'tbl_orders.product_id', '=', 'tbl_product.id')
			//->join('tbl_order_status', 'tbl_orders.cart_id', '=', 'tbl_cart.id')
			->select(
				'users.name',
				'users.email',
				'tbl_product.product_name',
				'tbl_orders.user_id',
				'tbl_orders.id',
				'tbl_orders.when_needed',
				'tbl_orders.quantity',
				'tbl_orders.order_code',
				'tbl_orders.amount',
				'tbl_orders.status'
			)
			->where('tbl_orders.id', $id)
			->orderBy('tbl_orders.create_at', 'ASC')
			->get();
		foreach($orders_edit as $order_edit) { 
			return \View::make('admin/order/update', compact('order_edit')); 
		}
	}
	public function update(Request $request, $id)
	{
		
		$order_update = $request->all();
		$order = Order::find($id);
		$order->update($order_update);
		
		
		$user_details = $request->all();
		$user_id = $user_details['user_id'];
		
		$orders_stat = DB::table('tbl_orders')
			->join('users', 'tbl_orders.user_id', '=', 'users.id')
			->join('tbl_product', 'tbl_orders.product_id', '=', 'tbl_product.id')
			//->join('tbl_order_status', 'tbl_orders.cart_id', '=', 'tbl_cart.id')
			->select(
				'users.name',
				'users.email',
				'users.phone_number',
				'tbl_product.product_name',
				'tbl_orders.user_id',
				'tbl_orders.id',
				'tbl_orders.when_needed',
				'tbl_orders.quantity',
				'tbl_orders.order_code',
				'tbl_orders.amount',
				'tbl_orders.status'
			)
			->where('tbl_orders.user_id', $user_id)
			->orderBy('tbl_orders.create_at', 'ASC')
			->first();	
		/*Mail::send('admin.emails.order', ['order_stat' => $orders_stat], function($message) use ($orders_stat) {
			$message->to($orders_stat->email)->subject('Order details');
		});*/
//		SMS::send('SMS from online ordering',  null , function($sms) use ($orders_stat){
//			$sms->to($orders_stat->phone_number, 'smart communication');
//		});
//		
		Twilio::message('+639103176307', 'sample');
		
		Session::flash('order_update', 'Order '.$order->order_code.' has been updated');
		return redirect()->back();
	}
	public function destroy()
	{
		
	}
	public function show(Request $request)
	{
		$orders = DB::table('tbl_orders')
				->join('users', 'tbl_orders.user_id', '=', 'users.id')
				->join('tbl_product', 'tbl_orders.product_id', '=', 'tbl_product.id')
				//->join('tbl_order_status', 'tbl_orders.cart_id', '=', 'tbl_cart.id')
				->select(
					'users.name',
					'users.email',
					'tbl_product.product_name',
					'tbl_orders.id',
					'tbl_orders.when_needed',
					'tbl_orders.quantity',
					'tbl_orders.order_code',
					'tbl_orders.amount',
					'tbl_orders.status'
				)
				->orderBy('tbl_orders.when_needed', 'ASC')
				->get();
		return \View::make('admin/order/index', compact('orders'));
	}
}
