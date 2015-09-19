@extends('datatables.template')

@section('demo')
<table id="posts-table" class="table table-condensed">
    <caption>
        <div class="alert alert-warning margin">
            <p>
                <strong>Heads Up!</strong> When using join statements, you must follow the <strong>table.column</strong> approach on your js columns definition.
            </p>
            <p>
                Example columns definition:
                <pre><code>columns: [{data: 'id', name: 'posts.id'}, {data: 'name', name: 'users.name'}]</code></pre>
            </p>
        </div>
    </caption>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author Name</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getJoins()
    {
        return view('datatables.eloquent.joins');
    }

    public function getJoinsData()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->select(['posts.id', 'posts.title', 'users.name', 'users.email', 'posts.created_at', 'posts.updated_at']);

        return Datatables::of($posts)
            ->editColumn('title', '@{!! str_limit($title, 60) !!}')
            ->editColumn('name', function ($model) {
                return \HTML::mailto($model->email, $model->name);
            })
            ->make(true);
    }
@endsection

@section('js')
    $('#posts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/joins-data") }}',
        columns: [
            {data: 'id', name: 'posts.id'},
            {data: 'title', name: 'posts.title'},
            {data: 'name', name: 'users.name'},
            {data: 'created_at', name: 'posts.created_at'},
            {data: 'updated_at', name: 'posts.updated_at'}
        ]
    });
@endpush
