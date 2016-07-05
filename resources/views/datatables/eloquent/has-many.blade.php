@extends('datatables.template')

@section('demo')
<table id="posts-table" class="table table-condensed">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getHasMany()
    {
        return view('datatables.eloquent.has-many');
    }

    public function getHasManyData()
    {
        $posts = User::first()->posts()->with('user');

        return Datatables::of($posts)
            ->editColumn('title', '@{!! str_limit($title, 60) !!}')
            ->make(true);
    }
@endsection

@section('js')
    $('#posts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/has-many-data") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'user.name', name: 'name', orderable: false, searchable: false},
            {data: 'user.email', name: 'email', orderable: false, searchable: false},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
@endsection
