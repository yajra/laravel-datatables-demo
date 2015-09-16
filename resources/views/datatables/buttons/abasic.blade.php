@extends('datatables.template')

@section('demo')
    {!! $dataTable->table() !!}
@endsection

@section('controller')
    public function getIndex(UsersDataTable $dataTable)
    {
    return $dataTable->render('datatables.buttons.basic');
    }
@endsection

@section('js')
    $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    dom: 'Bfrtip',
    ajax: '',
    columns: [
    {data: 'id', name: 'id'},
    {data: 'name', name: 'name'},
    {data: 'email', name: 'email'},
    {data: 'created_at', name: 'created_at'},
    {data: 'updated_at', name: 'updated_at'}
    ],
    buttons: [
    'csv', 'excel', 'pdf', 'print'
    ]
    });
@endsection

@push('scripts')
<link rel="stylesheet" href="/js/buttons/css/buttons.dataTables.css">
<script src="/js/buttons/js/dataTables.buttons.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
@stop
