@extends('datatables.template')

@section('demo')
<br/>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Custom Filter</h3>
    </div>
    <div class="panel-body">
        <form method="POST" id="search-form" class="form-inline" role="form">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="search name">
            </div>
            <div class="form-group">
                <label for="email"># of Post</label>
                <select name="operator" id="operator" class="form-control">
                    <option value=">=">&gt=</option>
                    <option value="=">=</option>
                    <option value=">">&gt</option>
                    <option value="<">&lt</option>
                </select>
                <input type="number" class="form-control" name="post" id="post">
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

<table id="users-table" class="table table-condensed">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th># of Post</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getAdvanceFilter()
    {
        return view('datatables.fluent.advance-filter');
    }

    public function getAdvanceFilterData(Request $request)
    {
        $users = DB::table('users')->select([
                DB::raw("CONCAT(users.id,'-',users.id) as id"),
                'users.name',
                'users.email',
                DB::raw('count(posts.user_id) AS count'),
                'users.created_at',
                'users.updated_at'
        ])->leftJoin('posts','posts.user_id','=','users.id')
        ->groupBy('users.id');

        $datatables =  Datatables::of($users);
        if ($request->get('post')) {
            $datatables->having('count', $request->get('operator'), $request->get('post')); // having count search
        }

        if ($name = $request->get('name')) {
            $datatables->where('users.name', 'like', "$name%"); // additional users.name search
        }

        // Global search function
        if ($keyword = $request->get('search')['value']) {
            // override users.name global search
            $datatables->filterColumn('users.name', 'where', 'like', "$keyword%");

            // override users.id global search - demo for concat
            $datatables->filterColumn('users.id', 'whereRaw', "CONCAT(users.id,'-',users.id) like ? ", ["%$keyword%"]);
        }

        return $datatables->make(true);
    }
@endsection

@section('js')
    var oTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ url("fluent/advance-filter-data") }}',
            data: function (d) {
                d.name = $('input[name=name]').val();
                d.operator = $('select[name=operator]').val();
                d.post = $('input[name=post]').val();
            }
        },
        columns: [
            {data: 'id', name: 'users.id'},
            {data: 'name', name: 'users.name'},
            {data: 'email', name: 'users.email'},
            {data: 'count', name: 'count', searchable: false},
            {data: 'created_at', name: 'users.created_at'},
            {data: 'updated_at', name: 'users.updated_at'}
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
@endsection
