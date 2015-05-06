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
					<th>Email</th>
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
		ajax: '/eloquent/relationships-data',
		columns: [
			{data: 'id', name: 'id'},
			{data: 'id', name: 'title'},
			{data: 'user.name', name: 'name', orderable: false, searchable: false},
			{data: 'user.email', name: 'email', orderable: false, searchable: false},
			{data: 'created_at', name: 'created_at'},
			{data: 'updated_at', name: 'updated_at'}
		]
	});
});
</script>
@endpush
