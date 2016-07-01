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
    public function getManualCount(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();

            return Datatables::of($users)
                ->setTotalRecords(100)
                ->make(true);
        }

        return view('datatables.eloquent.manual-count');
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '',
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'},
            {data: 'created_at'},
            {data: 'updated_at'}
        ]
    });
@endsection
