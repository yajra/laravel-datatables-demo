@extends('app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Custom Filter</h3>
			</div>
			<div class="panel-body">
				<form method="POST" id="search-form" class="form-inline" role="form">

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="search name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email" placeholder="search email">
					</div>

					<button type="submit" class="btn btn-primary">Search</button>
				</form>
			</div>
		</div>
		<table id="users-table" class="table table-condensed">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
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
	var oTable = $('#users-table').DataTable({
		dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
			"<'row'<'col-xs-12't>>"+
			"<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
		processing: true,
		serverSide: true,
		ajax: {
			url: '/collection/custom-filter-data',
			data: function (d) {
				d.name = $('input[name=name]').val();
				d.email = $('input[name=email]').val();
			}
		},
		columns: [
			{data: 'id', name: 'id'},
			{data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
			{data: 'created_at', name: 'created_at'},
			{data: 'updated_at', name: 'updated_at'}
		]
	});

	$('#search-form').on('submit', function(e) {
		oTable.draw();
		e.preventDefault();
	});
});
</script>
@endpush
