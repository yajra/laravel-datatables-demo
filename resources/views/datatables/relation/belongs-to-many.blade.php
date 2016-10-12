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
    public function getBelongsToMany(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('blogs')->selectRaw('distinct users.*');

            return $this->dataTable
                ->eloquent($query)
                ->addColumn('title', function (User $user) {
                    return $user->blogs->map(function($blog) {
                        return str_limit($blog->title, 30, '...');
                    })->implode('&lt;br&gt;');
                })
                ->make(true);
        }

        return view('datatables.relation.belongs-to-many', [
            'title' => 'Belongs To Many Demo',
            'controller' => 'Relation Controller',
        ]);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("relation/belongs-to-many") }}',
        columns: [
            {data: 'id', name: 'users.id'},
            {data: 'name', name: 'users.name'},
            {data: 'email', name: 'users.email'},
            {data: 'title', name: 'blogs.title'},
        ]
    });
@endsection
