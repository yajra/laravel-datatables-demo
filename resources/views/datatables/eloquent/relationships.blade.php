@extends('datatables.template')

@section('demo')
<table id="posts-table" class="table table-condensed">
    <caption>
        <div class="alert alert-warning margin">
            <p><strong>Heads Up!</strong> Searching/sorting on eager loaded models is not yet supported!</p>
        </div>
    </caption>
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
    public function getRelationships()
    {
        return view('datatables.eloquent.relationships');
    }

    public function getRelationshipsData()
    {
        $posts = Post::with('user')->select('*');

        return Datatables::of($posts)
            ->editColumn('title', '@{!! str_limit($title, 60) !!}')
            ->make(true);
    }
@endsection

@section('js')
    $('#posts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/relationships-data") }}',
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
