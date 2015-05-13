@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th># of Post</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getCount()
    {
        return view('datatables.eloquent.count');
    }

    public function getCountData()
    {
        $users = User::select([
            'users.id',
            'users.name',
            'users.email',
            \DB::raw('count(posts.user_id) as count'),
            'users.created_at',
            'users.updated_at'
        ])->join('posts','posts.user_id','=','users.id')
        ->groupBy('posts.user_id');

        return Datatables::of($users)->make(true);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/count-data") }}',
        columns: [
            {data: 'id', name: 'users.id'},
            {data: 'name', name: 'users.name'},
            {data: 'email', name: 'users.email'},
            {data: 'count', name: 'count', searchable: false},
            {data: 'created_at', name: 'users.created_at'},
            {data: 'updated_at', name: 'users.updated_at'}
        ]
    });
@endsection
