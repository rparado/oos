@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title')
@section('main')
	<div class="x_panel">
		<div class="x_title">
			<h3>Order List</h3>
		</div>
		<div class="x_content">
			@if(count($orders) > 0)
			<table class="table table-striped table-bordered clearfix jambo_table bulk_action" id="order-table">
				<thead>
					<tr>
						<th><span class="wcicon-status-processing" title="status"></span></th>
						<th>Order</th>
						<th>Quantity</th>
						<th>When needed</th>
						<th>Total</th>
						<th>View Order</th>
					</tr>
				</thead>
				<tbody>

					@foreach($orders as $order)
					<tr>
						<td>
							<?php
								$class = '';
								if($order->status == 'Pending Payment') {
									$class = 'wcicon-status-pending status-pending';
									$tooltip = 'Pending Payment';
								} elseif ($order->status == 'On Hold') {
									$class = 'wcicon-on-hold status-onhold';
									$tooltip = 'On Hold';
								} elseif ($order->status == 'Completed') {
									$class = 'wcicon-status-completed status-completed';
									$tooltip = 'Completed';
								} elseif($order->status == 'Cancelled') {
									$class = 'wcicon-status-cancelled status-cancelled';
									$tooltip = 'Cancelled';
								} elseif($order->status == 'Refunded') {
									$class = 'wcicon-status-refunded status-refunded';
									$tooltip = 'Refunded';
								} elseif($order->status == 'Failed') {
									$class = 'wcicon-status-failed status-failed';
									$tooltip = 'Failed';
								} else {
									$class = 'wcicon-status-processing status-processing';
									$tooltip = 'Processing';
								}
							?>
							<span class="status-mark {{$class}}" title="{{$tooltip}}"></span>
						</td>
						<td>
							<a href="{{route('admin.order.edit', $order->id)}}">{{$order->order_code}}</a> <small>by {{$order->name}} <br /><a href="mailto::{{$order->email}}">{{$order->email}}</a></small>
						</td>
						<td>
							{{$order->quantity}}
						</td>
	
						<td>
							{{$order->when_needed}}
						</td>
						<td>
							{{$order->amount}}
						</td>
						<td>
							<a href="{{route('admin.order.edit', $order->id)}}" class="wcicon-view btn-view-order"></a>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
			@else
				<table class="table table-striped table-bordered clearfix jambo_table bulk_action" id="category-table">
					<tbody>
						
						<tr>
							<td colspan="4">No data Found</td>
						</tr>

					</tbody>
			</table>
			@endif
		</div>
	</div>
@endsection