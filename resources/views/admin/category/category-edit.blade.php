@extends('admin.master')

@section('page-title', 'Edit Category')

@section('content-heading', 'Update Category')

@section('mainContent')
	<div class="panel-body">
		<div class="row">

			<div class="col-lg-6">
				
				<h3 style="color: blue;">{{ Session::get('message') }}</h3>

				{!! Form::open(['url' => '/category/update', 'method' => 'post', 'name' => 'edit-form']) !!}
					<div class="form-group">
						<label>Category Name</label>
						<input class="form-control" name="cat_name" value="{{ $category_id->catName }}">
					</div>

					<div class="form-group">
						<label>Short Description</label>
						<textarea class="form-control" placeholder="Enter Short Description" name="cat_description">{{ $category_id->catDescription }}</textarea>
					</div>

					<div class="form-group">
						<label>Publication Status</label>
						<select class="form-control" name="pb_status">
							<option value='1'>Published</option>
							<option value='0'>Unpublished</option>
						</select>
					</div>

						<input type="hidden" name="cat_id" value="{{ $category_id->id }}">

					<div class="form-group">
						<input type="submit" value="Submit" class="btn btn-block btn-primary" >
					</div>

				{!! Form::close() !!}
				<script type="text/javascript">
					document.forms['edit-form'].elements['pb_status'].value = "{{ $category_id->publicationStatus }}"
				</script>
			</div>
		</div>
	</div>
@endsection