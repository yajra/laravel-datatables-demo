@extends('datatables.template')

@section('demo')
<table id="posts-table" class="table table-condensed">
    <caption>
        <div class="alert alert-success margin">
            <p><strong>Heads Up!</strong> When searching/sorting for eager loaded models, your column name must be declared like <strong>relation.column</strong>
            <pre><code>columns: [{data: 'id', name: 'posts.id'}, {data: 'user.name', name: 'user.name'}]</code></pre>

            <p><strong>Important!</strong> To avoid ambiguous column name error, it is advised to declare your column name as <strong>table.column</strong> just like on how you declare it when using a join statements.</p>
            <pre><code>columns: [
    {data: 'id', name: 'posts.id'},
    {data: 'title', name: 'posts.title'},
    {data: 'user.name', name: 'user.name'},
    {data: 'user.email', name: 'user.email'},
    {data: 'created_at', name: 'posts.created_at'},
    {data: 'updated_at', name: 'posts.updated_at'}
]
</code></pre>
            <br>
            <p>If your relations consists of (2) two or more words, the convention to use is as follows:</p>
            <pre><code>{data: 'relation_name.column', name: 'relationName.column'}</code></pre>
            Searching available since <strong>v6.4.0</strong>.
            <br>
            Sorting available since <strong>v6.7.0</strong>.
        </div>
        <div class="alert alert-danger">
            It is advised that you include <strong>select('table.*')</strong> on query to avoid weird issues where id from related model replaces the id of the main model.
            <pre><code>$posts = Post::with('user')->select('posts.*');</code></pre>
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
        $posts = Post::with('user')->select('posts.*');

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
            {data: 'id', name: 'posts.id'},
            {data: 'title', name: 'posts.title'},
            {data: 'user.name', name: 'user.name'},
            {data: 'user.email', name: 'user.email'},
            {data: 'created_at', name: 'posts.created_at'},
            {data: 'updated_at', name: 'posts.updated_at'}
        ]
    });
@endsection
