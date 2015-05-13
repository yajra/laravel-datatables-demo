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
    public function getUnion()
    {
        return view('datatables.fluent.union');
    }

    public function getUnionData()
    {
        $first = DB::table('users')
            ->select(['id', 'name', 'email', 'created_at', 'updated_at'])
            ->where('name', 'like', '%jon%');

        $users = DB::table('users')
            ->select(['id', 'name', 'email', 'created_at', 'updated_at'])
            ->where('name', 'like', '%sus%')
            ->union($first);

        return Datatables::of($users)->make(true);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("fluent/union-data") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
@endsection
