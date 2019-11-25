@extends('admin.master')

@section('page-title', 'Product Entry')

@section('content-heading', 'Add New Product')

@section('mainContent')
	<div class="panel-body">
		<div class="row">


			@if($errors->all())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                 <li>{{$error}}</li>  
                @endforeach
              </div>
          	@endif

			
			<div class="col-lg-6">
				
				<h3 style="color: blue;">{{ Session::get('message') }}</h3>

				{!! Form::open(['url' => '/product/entry', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

					<div class="form-group">
						<label>Product Name</label>
						<input class="form-control" type="text" name="product_name" placeholder="Enter New Product">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" type="number" name="product_price">
					</div>
					<div class="form-group">
						<label>Quantity</label>
						<input class="form-control" type="number" name="product_qty">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="cat_id">
							@foreach($category as $x)
							<option value='{{ $x->id }}'>{{ $x->catName }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" placeholder="Enter Product Description" name="product_description"></textarea>
					</div>
					<div class="form-group">
						<label>Picture</label>
						<input class="form-control" type="file" name="product_pic">
					</div>
					<div class="form-group">
						<label>Publication Status</label>
						<select class="form-control" name="pb_status">
							<option value='1'>Published</option>
							<option value='0'>Unpublished</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="Submit" class="btn btn-block btn-primary">
					</div>
					
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection