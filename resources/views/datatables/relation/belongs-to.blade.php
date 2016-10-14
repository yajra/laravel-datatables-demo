@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Email</th>
    </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getBelongsTo(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::with('user')->select('posts.*');

            return $this->dataTable->eloquent($query)->make(true);
        }

        return view('datatables.relation.belongs-to', [
            'title'      => 'Model Belongs To Demo',
            'controller' => 'Relation Controller',
        ]);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '',
        columns: [
            {data: 'id', name: 'posts.id'},
            {data: 'title', name: 'posts.title'},
            {data: 'user.name', name: 'user.name'},
            {data: 'user.email', name: 'user.email'}
        ]
    });
@endsection
