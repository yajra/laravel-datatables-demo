@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getWithTrashed(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(User::withTrashed())
                ->withTrashed()
                ->make(true);
        }

        return view('datatables.eloquent.with-trashed', ['title' => 'Model With Trashed (Soft Deletes)']);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
@endsection
