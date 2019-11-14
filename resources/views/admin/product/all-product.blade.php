@extends('admin.master')

@section('page-title', 'Products')

@section('content-heading')
	<center>All Product</center>
@endsection

@section('mainContent')
	<center>
		<h3 style="color: blue;">{{ Session::get('message') }}</h3>
	
		<!-- <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<label>Select Type</label>
					<select class="form-control" name="pro_type">
						<option value=''>All</option>
						<option value='1'>Published</option>
						<option value='0'>Unpublished</option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" value="Search" class="btn btn-block btn-primary" >
				</div>
			</div>
		</div> -->

		<table align="center" class="table table-bordered table-hover table-condensed table-striped table-responsive">
			<tr>
				<th>SI.</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Category</th>
				<th>Description</th>
				<th>Picture</th>
				<th>Publication Status</th>
				<th>Action</th>
			</tr>

			@foreach($all_product as $product)
				<tr align="center">
					<td>{{$loop->index + 1}}</td>
					<td>{{ $product->productName }}</td>
					<td>{{ $product->price }}</td>
					<td>{{ $product->qty }}</td>
					<td>{{ $product->catName }}</td>
					<td>{{ $product->productDescription }}</td>
					<td>
						<img src="{{ asset($product->productPic) }}" class="img-responsive img-thumbnail" width="150">
					</td>

					<td>
						<a href="{{ url('/pro_status/edit/'.$product->p_id) }}" class="btn btn-primary btn-sm">
							{{ ($product->pbStatus == 1)? 'Published' : 'Unpublished' }}
						</a>
					</td>
					<td>
						<a href="{{ url('/product/singleView/'.$product->p_id) }}" class="btn btn-success btn-sm" title="View Product"><i class="fa fa-eye"></i></a>

						<a href="{{ url('/product/edit/'.$product->p_id) }}" class="btn btn-primary btn-sm" title="Edit Product"><i class="fa fa-edit"></i></a>

						<a href="{{ url('/product/delete/'.$product->p_id) }}" onclick="return confirm('Are You sure to delete!')" class="btn btn-danger btn-sm" title="Delete Product"><i class="fa fa-trash-o"></i></a>
					</td>
					
				</tr>
			@endforeach
		</table>
		{{ $all_product->links() }}
	</center>
@endsection
