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
            ->select(['id', 'name', 'email', 'created_at', 'updated_at']);

        $union = DB::table('users')
            ->select(['id', 'name', 'email', 'created_at', 'updated_at'])
            ->union($first);

        $query = DB::table(DB::raw("({$union->toSql()}) as x"))
            ->select(['id', 'name', 'email', 'created_at', 'updated_at'])
            ->where(function ($query) {
                $query->where('id', '<', 50)
                    ->orWhere('id', '>', 100);
            });

        return Datatables::of($query)->make(true);
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
