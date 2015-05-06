@extends('app')

@section('content')
<div class="row">
	<div class="col-md-12">
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
            <tfoot>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</tfoot>
	</table>
	</div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
	$('#users-table').DataTable({
		processing: true,
		serverSide: true,
        ajax: '/fluent/multi-filter-select-data',
		columns: [
			{data: 'id', name: 'id'},
			{data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
			{data: 'created_at', name: 'created_at'},
			{data: 'updated_at', name: 'updated_at'}
		],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = $('<input class="form-control">')
                .appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
                });
            });
        }
	});
});
</script>
@endpush
