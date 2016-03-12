@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <caption>
        <div class="alert alert-success">
            <p>Sorting and searching will only work on columns explicitly defined as whitelist.</p>
            <pre><code>->whitelist(['name', 'email'])</code></pre>
        </div>
    </caption>
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
    public function getWhitelist(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(User::query())
                ->whitelist(['name', 'email'])
                ->make(true);
        }

        return view('datatables.eloquent.whitelist', ['title' => 'Whitelist Columns']);
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
