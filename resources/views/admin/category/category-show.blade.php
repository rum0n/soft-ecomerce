@extends('admin.master')

@section('page-title', 'All Categories')

@section('content-heading')
	<center>All Categories</center>
@endsection

@section('mainContent')
	<center>
		<h3 style="color: blue;">{{ Session::get('message') }}</h3>
		
		<?php $i = 0; ?>
		<table align="center" class="table table-bordered table-hover table-condensed table-striped">
			<tr>
				<th>SI.</th>
				<th>Name</th>
				<th>Description</th>
				<th>Publication Status</th>
				<th>Action</th>
			</tr>

			@foreach($cat_show as $cat_view)
				<tr align="center">
					<td>{{ ++$i }}</td>
					<td>{{ $cat_view->catName }}</td>
					<td>{{ $cat_view->catDescription }}</td>
					<td>
						<a href="{{ url('/cat_status/edit/'.$cat_view->id) }}" class="btn btn-primary btn-sm">
							{{ ($cat_view->publicationStatus == 1)? 'Published' : 'Unpublished' }}
						</a>
					</td>
					<td>
						<a href="{{ url('/category/view/'.$cat_view->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
						<a href="{{ url('/category/edit/'.$cat_view->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

						<a href="{{ url('/category/delete/'.$cat_view->id) }}" onclick="return confirm('Are You sure to delete!')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
					</td>
					
				</tr>
			@endforeach
		</table>
		{{ $cat_show->links() }}
	</center>
@endsection
