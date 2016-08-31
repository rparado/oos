@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
<div class="x_panel">
	<div class="x_title">
		<h3>Order {{$order_edit->order_code}} details</h3>
	</div>
	<div class="x_content">
		@if(Session::has('order_update'))
			<div class="alert alert-success fade in"><span class="glyphicon glyphicon-ok"></span><em> {!! session('order_update') !!}</em>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
		@endif
		{!! Form::model($order_edit, ['method' => 'PATCH', 'class' => 'row', 'route' => ['admin.order.update', $order_edit->id]]) !!}
		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Customer name', 'Customer name') !!}
			{!! Form::text('user_id',$order_edit->name, array('class' => 'form-control', 'disabled')) !!}
			<input type="hidden" value="<?php echo $order_edit->user_id?>" name="user_id">
		</div>

		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Order Date', 'Order Date') !!}
			{!! Form::text('when_needed',null, array('class' => 'form-control', 'readonly')) !!}
		</div>

		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('status', 'Status') !!}
			{{ Form::select('status', [
			   'Pending Payment' => 'Pending Payment',
			   'Processing' => 'Processing',
			   'On Hold' => 'On Hold',
			   'Completed' => 'Completed',
			   'Cancelled' => 'Cancelled',
			   'Refunded' => 'Refunded',
			   'Failed' => 'Failed'
			   ], null, array('class' => 'form-control')) 
			}}
		</div>
		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Quantity', 'Quantity') !!}
			{!! Form::text('quantity',null, array('class' => 'form-control')) !!}
		</div>
		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Amount', 'Amount') !!}
			{!! Form::text('amount',null, array('class' => 'form-control')) !!}
		</div>
		<div class="form-group col-xs-12">
			{!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
		</div>
	{!! Form::close() !!}
	</div>
</div>
	
	
@endsection