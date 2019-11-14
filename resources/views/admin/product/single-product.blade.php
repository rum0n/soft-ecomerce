@extends('admin.master')

@section('page-title', 'Product')

@section('content-heading')
	<center>Single Product</center>
@endsection

@section('mainContent')
	<div class="row">
		<div class="col-md-6 col-md-offset-3"><img src="{{ asset($single_product->productPic) }}" class="img-responsive img-thumbnail"></div>
	</div>
	<center>
		<h3 style="color: blue;">{{ Session::get('message') }}</h3>

	
		<?php $i = 0; ?>
		<table align="center" class="table table-bordered table-hover table-condensed table-striped">
			<tr>
				<th>Name</th><td>{{ $single_product->productName }}</td>
			</tr>
			<tr>
				<th>Price</th><td>{{ $single_product->price }}</td>
			</tr>
			<tr>
				<th>Quantity</th><td>{{ $single_product->qty }}</td>
			</tr>
			<tr>
				<th>Category</th><td>{{ $single_product->catName }}</td>
			</tr>
			<tr>
				<th>Description</th><td>{{ $single_product->productDescription }}</td>
			</tr>
			<tr>
				<th>Publication Status</th>
					<td>
						<a href="{{ url('/pro_status/edit/'.$single_product->p_id) }}" class="btn btn-primary btn-sm">
							{{ ($single_product->pbStatus == 1)? 'Published' : 'Unpublished' }}
						</a>
					</td>
				</tr>


					
		</table>
		<div>
			<center>
				<a href="{{ url('/product/edit/'.$single_product->id) }}" class="btn btn-primary btn-lg">  Edit </a>

				<a href="{{ url('/product/delete/'.$single_product->id) }}" onclick="return confirm('Are You sure to delete!')" class="btn btn-danger btn-lg"> Delete </a>
			</center>
		</div>
		<br><br>

	</center>
@endsection
