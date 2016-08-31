@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
<div class="x_panel">
	<div class="x_title">
		<h3>Update Category</h3>
	</div>
	<div class="x_content">
		@if(Session::has('category_updated'))
			<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('category_updated') !!}</em>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</div>
		@endif
		{!! Form::model($category, ['method' => 'PATCH', 'class' => 'row', 'route' => ['admin.category.update', $category->id]]) !!}
		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Category name', 'Category Name') !!}
			{!! Form::text('category_name', null, array('class' => 'form-control', 'placeholder' => 'update category name')) !!}
		</div>
		
		<div class="form-group col-xs-12">
			{!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
		</div>
	{!! Form::close() !!}
	</div>
</div>
	
	
@endsection