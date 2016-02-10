@extends('datatables.template')

@section('demo')
<table id="posts-table" class="table table-condensed">
    <caption>
        <div class="alert alert-danger margin">
            <p><strong>Heads Up!</strong> Sorting on eager loaded models is not yet supported!</p>
        </div>
        <div class="alert alert-success margin">
            <p><strong>Heads Up!</strong> When searching for eager loaded models, your column name must be declared like <strong>relation.column</strong>
            <pre><code>columns: [{data: 'id', name: 'posts.id'}, {data: 'name', name: 'user.name'}]</code></pre>
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
            {data: 'user.name', name: 'user.name', orderable: false},
            {data: 'user.email', name: 'user.email', orderable: false},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
@endsection
