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
            $query = User::with('onePost')->select('users.*');

            return $this->dataTable
                ->eloquent($query)
                ->addColumn('title', function (User $user) {
                    return $user->onePost ? str_limit($user->onePost->title, 30, '...') : '';
                })
                ->make(true);
        }

        return view('datatables.relation.has-one', [
            'title' => 'Has One Demo',
            'controller' => 'Relation Controller',
        ]);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("relation/has-one") }}',
        columns: [
            {data: 'id', name: 'users.id'},
            {data: 'name', name: 'users.name'},
            {data: 'email', name: 'users.email'},
            {data: 'title', name: 'onePost.title'},
        ]
    });
@endsection
