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
    public function getCarbon()
    {
        return view('datatables.collection.carbon');
    }

    public function getCarbonData()
    {
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at'])->get();

        return Datatables::of($users)
            ->editColumn('created_at', '@{!! $created_at !!}')
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->format('Y/m/d');
            })
            ->make(true);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("collection/carbon-data") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
@endsection
