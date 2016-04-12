@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <thead>
    <tr>
        <th></th>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
</table>
<script id="details-template" type="text/x-handlebars-template">
    <div class="label label-info">User @{{ name }}'s Posts</div>
    <table class="table details-table" id="posts-@{{id}}">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
            </tr>
        </thead>
    </table>
</script>
@endsection

@section('extra')
    <h3 class="lead">Details Template (using Handlebars)</h3>
    <pre><code>
    &lt;script id="details-template" type="text/x-handlebars-template"&gt;
        &lt;div class="label label-info"&gt;User @{{ name }}'s Posts&lt;/div&gt;
        &lt;table class="table details-table" id="posts-@{{id}}"&gt;
            &lt;thead&gt;
            &lt;tr&gt;
                &lt;th&gt;Id&lt;/th&gt;
                &lt;th&gt;Title&lt;/th&gt;
            &lt;/tr&gt;
            &lt;/thead&gt;
        &lt;/table&gt;
    &lt;/script&gt;
        </code></pre>
@stop

@section('controller')
public function getMaster()
{
    return view('datatables.eloquent.master');
}

public function getMasterData()
{
    $users = User::select();

    return Datatables::of($users)
        ->addColumn('details_url', function($user) {
            return url('eloquent/details-data/' . $user->id);
        })
        ->make(true);
}

public function getDetailsData($id)
{
    $posts = User::find($id)->posts();

    return Datatables::of($posts)->make(true);
}
@endsection

@section('js')
    var template = Handlebars.compile($("#details-template").html());
    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/master-data") }}',
        columns: [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":      false,
                "data":           null,
                "defaultContent": ''
            },
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ],
        order: [[1, 'asc']]
    });

    // Add event listener for opening and closing details
    $('#users-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'posts-' + row.data().id;

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(template(row.data())).show();
            initTable(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }
    });

    function initTable(tableId, data) {
        $('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' }
            ]
        })
    }
@endsection
