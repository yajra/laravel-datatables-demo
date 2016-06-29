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
    <table class="table">
        <tr>
            <td>Full name:</td>
            <td>@{{name}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>@{{email}}</td>
        </tr>
        <tr>
            <td>Extra info:</td>
            <td>And any further details here (images etc)...</td>
        </tr>
    </table>
</script>
@endsection

@section('extra')
    <h3 class="lead">Details Template (using Handlebars)</h3>
    <pre><code>&ltscript id="details-template" type="text/x-handlebars-template"&gt
    &lttable class="table"&gt
        &lttr&gt
            &lttd&gtFull name:&lt/td&gt
            &lttd&gt@{{name}}&lt/td&gt
        &lt/tr&gt
        &lttr&gt
            &lttd&gtEmail:&lt/td&gt
            &lttd&gt@{{email}}&lt/td&gt
        &lt/tr&gt
        &lttr&gt
            &lttd&gtExtra info:&lt/td&gt
            &lttd&gtAnd any further details here (images etc)...&lt/td&gt
        &lt/tr&gt
    &lt/table&gt
&lt/script&gt</code></pre>
@endsection

@section('controller')
    public function getRowDetails()
    {
        return view('datatables.eloquent.row-details');
    }

    public function getRowDetailsData()
    {
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)->make(true);
    }
@endsection

@section('js')
    var template = Handlebars.compile($("#details-template").html());

    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/row-details-data") }}',
        columns: [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":     false,
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
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( template(row.data()) ).show();
            tr.addClass('shown');
        }
    });
@endsection
