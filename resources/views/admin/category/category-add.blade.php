@extends('admin.master')

@section('page-title', 'Category Entry')

@section('content-heading', 'New Category Entry')

@section('mainContent')
	<div class="panel-body">
		<div class="row">

			<div class="col-lg-6">
				
				<h3 style="color: blue;">{{ Session::get('message') }}</h3>

				{!! Form::open(['url' => '/category/entry', 'method' => 'post' ]) !!}
					<div class="form-group">
						<label>Category Name</label>
						<input class="form-control" type="text" name="cat_name" placeholder="Enter New Category">
					</div>
					<div class="form-group">
						<label>Short Description</label>
						<textarea class="form-control" placeholder="Enter Short Description" name="cat_description"></textarea>
					</div>
					<div class="form-group">
						<label>Publication Status</label>
						<select class="form-control" name="pb_status">
							<option value='1'>Published</option>
							<option value='0'>Unpublished</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="Submit" class="btn btn-block btn-primary" >
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection