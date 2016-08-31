@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title')
@section('main')
	<div class="x_panel">
		<div class="x_title">
			<h3>Create Category</h3>
		</div>
		<div class="x_content">

			@if($errors->has())
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
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
			@if(Session::has('cat_message'))
				<div class="alert alert-success fade in"><span class="glyphicon glyphicon-ok"></span><em> {!! session('cat_message') !!}</em>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			@endif
			{!! Form::open(['url' => 'admin/category', 'method' => 'post', 'class' => 'row']) !!}
				<div class="form-group col-xs-12">
					{!! Form::Label('Department number', 'Category Name') !!}
					{!! Form::text('category_name', null, array('class' => 'form-control')) !!}
				</div>
				<div class="form-group col-xs-12">
					{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection