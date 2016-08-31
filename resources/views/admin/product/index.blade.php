@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title')
@section('main')
	<div class="x_panel">
		<div class="x_title">
			<h3>Create Product</h3>
		</div>
		<div class="x_content">
				@if($errors->has())
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;
			</button>
				<ul class="validation-result">
					@foreach($errors->all() as $error)
						<li>
							{{$error}}
						</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('product_message'))
				<div class="alert alert-success fade in"><span class="glyphicon glyphicon-ok"></span><em> {!! Session::get('product_message') !!}</em>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			@endif
			{!! Form::open(['url' => 'admin/product', 'method' => 'post', 'class' => 'row','files'=>true]) !!}
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Category', 'Category') !!}
					{!! Form::select('category_id', $category, null, array('class' => 'form-control')) !!}
				</div>
				

				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Product Name', 'Product Name') !!}
					{!! Form::text('product_name', null, array('class' => 'form-control', 'placeholder' => 'Enter product name')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6" style="height: 58px">
					{!! Form::label('Upload Photo','Product Image') !!}
					{!! Form::file('product_image') !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('price', 'Price') !!}
					{!! Form::text('price', null, array('class' => 'form-control', 'placeholder' => 'Enter price')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('unit', 'Unit') !!}
					{!! Form::text('unit', null, array('class' => 'form-control', 'placeholder' => 'Enter unit')) !!}
				</div>
				
				<div class="form-group col-xs-12">
					{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection