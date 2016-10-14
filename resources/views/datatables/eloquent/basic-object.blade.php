@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <caption class="alert alert-success">
        Since v6.0, you can now optionally set <strong>column.name</strong> value to null.
        The package will automatically use <strong>column.data</strong> value as column name when filtering and sorting records.
        <br>
        <br>
        <strong>NOTE: </strong>This is only applicable if your column name is the same with the data to display. If not, you need to specify <strong>column.name</strong> on your script.
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
        return view('datatables.eloquent.basic-object');
    }

    public function getBasicObjectData()
    {
        return Datatables::of(User::query())->make(true);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/basic-object-data") }}',
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'},
            {data: 'created_at'},
            {data: 'updated_at'}
        ]
    });
@endsection
