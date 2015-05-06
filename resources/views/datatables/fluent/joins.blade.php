@extends('app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<table id="posts-table" class="table table-condensed">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Author Name</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</thead>
	</table>
	</div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
	$('#posts-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '/eloquent/joins-data',
		columns: [
			{data: 'id', name: 'posts.id'},
			{data: 'title', name: 'posts.title'},
			{data: 'name', name: 'users.name'},
			{data: 'created_at', name: 'posts.created_at'},
			{data: 'updated_at', name: 'posts.updated_at'}
		]
	});
});
</script>
@endpush
