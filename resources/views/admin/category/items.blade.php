@extends('admin.layouts.app')

{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	
	
	
	@if(count($categories) > 0 )
	<div class="x_panel">
		<div class="x_title clearfix">
			
			<div class="pull-left">
				<h3>Category Data</h3>
			</div>
			
			<div class="pull-right" style="line-height:46px;">
				<a style="margin-bottom: 0;" href="{{url('/admin/category/index')}}" class="btn btn-md btn-success"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
			</div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered clearfix jambo_table bulk_action" id="category-table">
				<thead>
					<tr>
						<th>Category Name</th>
					</tr>
				</thead>
				<tbody>

					@foreach($categories as $category)
					<tr>
						<td><a href="{{route('admin.category.edit', $category->id)}}">{{$category->category_name}}</a></td>
						
						<td>

							{!! Form::open([
								'method'=>'DELETE', 
								'route' => ['admin.category.destroy', $category->id]
							])
							!!}
							{!! Form::submit('Delete',
								[
									'class' => 'btn btn-danger'
								]
							) !!}
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
	
	@else
		<h3>No data Found</h3>
	@endif
	
@endsection