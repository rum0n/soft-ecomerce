@extends('admin.master')

@section('page-title', 'Product Edit')

@section('content-heading', 'Product Updation')

@section('mainContent')
	<div class="panel-body">
		<div class="row">

			<div class="col-lg-6">
				
				<h3 style="color: blue;">{{ Session::get('message') }}</h3>

				{!! Form::open(['url' => '/product/update', 'method' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'pro_edit_form']) !!}

					<div class="form-group">
						<label>Product Name</label>
						<input class="form-control" type="text" name="product_name" placeholder="Enter New Product" value="{{ $pro_Edit->productName }}">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" type="number" name="product_price" value="{{ $pro_Edit->price }}">
					</div>
					<div class="form-group">
						<label>Quantity</label>
						<input class="form-control" type="number" name="product_qty" value="{{ $pro_Edit->qty }}">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="cat_id">
							@foreach($categories as $x)
							<option value='{{ $x->id }}'>{{ $x->catName }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" placeholder="Enter Product Description" name="Product_description">{{ $pro_Edit->productDescription }}</textarea>
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
						<input type="hidden" name="pro_id" value="{{ $pro_Edit->p_id }}">
						<input type="submit" value="Submit" class="btn btn-block btn-primary" >
					</div>
					
				{!! Form::close() !!}
			</div>

			<script type="text/javascript">
				document.forms['pro_edit_form'].elements['cat_id'].value="{{ $pro_Edit->c_id }}"
				document.forms['pro_edit_form'].elements['pb_status'].value="{{ $pro_Edit->pbStatus }}"
			</script>

		</div>
	</div>
@endsection