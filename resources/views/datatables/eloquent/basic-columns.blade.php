@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <caption class="alert alert-success">
        <p>
            <strong>IMPORTANT: </strong>When using <strong>make()</strong>, the package will rely filtering and sorting based on the index/arrangement of your select query.
        </p>
        <br>
        <p>
            <strong>NEVER USE SELECT(*)</strong> when using this approach or your DataTables filtering/sorting may not work properly.
        </p>
    </caption>
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
    public function getBasicObject()
    {
        return view('datatables.eloquent.basic-columns');
    }

    public function getBasicObjectData()
    {
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)->make();
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/basic-columns-data") }}',
        columns: [
            {data: 0, name: 'id'},
            {data: 1, name: 'name'},
            {data: 2, name: 'email'},
            {data: 3, name: 'created_at'},
            {data: 4, name: 'updated_at'}
        ]
    });
@endsection
