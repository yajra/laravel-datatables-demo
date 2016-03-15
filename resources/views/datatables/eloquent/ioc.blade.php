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
</table>
@endsection

@section('controller')
    public function getIoc()
    {
        return view('datatables.eloquent.ioc');
    }

    public function getIocData()
    {
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);
        $datatables = app('datatables');

        return $datatables->eloquent($users)->make(true);
    }

    // OR via dependency injection
    public function getIocData(Datatables $datatables)
    {
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return $datatables->eloquent($users)->make(true);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/ioc-data") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
@endsection
