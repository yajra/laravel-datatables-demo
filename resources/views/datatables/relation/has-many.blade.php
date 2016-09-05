@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Post</th>
    </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getHasOne(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('posts')->select('users.*');

            return $this->dataTable
                ->eloquent($query)
                ->addColumn('title', function (User $user) {
                    return $user->posts->map(function($post) {
                        return str_limit($post->title, 30, '...');
                    })->implode('&lt;br&gt;');
                })
                ->make(true);
        }

        return view('datatables.relation.has-one', [
            'title' => 'Has Many Eager Loading Demo',
            'controller' => 'Relation Controller',
        ]);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("relation/has-many") }}',
        columns: [
            {data: 'id', name: 'users.id'},
            {data: 'name', name: 'users.name'},
            {data: 'email', name: 'users.email'},
            {data: 'title', name: 'posts.title'},
        ]
    });
@endsection
