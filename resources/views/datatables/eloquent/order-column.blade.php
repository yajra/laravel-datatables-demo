@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <caption>
        <div class="alert alert-success">
            <p>Order column has a special variable <strong>$1</strong> which is being replace as the order direction value of the request.</p>
            <pre><code>->orderColumn('name', 'email $1')</code></pre>
            <p>In this demo, when name column is sorted, it will be sorted by email instead.</p>
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
    public function getOrderColumn(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(User::query())
                ->orderColumn('name', 'email $1')
                ->make(true);
        }

        return view('datatables.eloquent.order-column', ['title' => 'Order Column API']);
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
