@extends('datatables.template')

@section('demo')
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
@endsection

@section('controller')
    public function getPostColumnSearch()
    {
        return view('datatables.eloquent.post-column-search');
    }

    public function anyColumnSearchData(Request $request)
    {
        $users = User::select([
            DB::raw("CONCAT(users.id,'-',users.id) as user_id"),
            'name',
            'email',
            'created_at',
            'updated_at'
        ]);

        return Datatables::of($users)
            ->filterColumn('user_id', function($query, $keyword) {
                $query->whereRaw("CONCAT(users.id,'-',users.id) like ?", ["%{$keyword}%"]);
            })
            ->make(true);

        return $datatables->make(true);
    }
@endsection

@section('js')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ url("eloquent/column-search-data") }}',
            method: 'POST'
        },
        columns: [
            {data: 'user_id', name: 'user_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    column.search($(this).val()).draw();
                });
            });
        }
    });
@endsection
