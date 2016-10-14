@extends('app')

@section('content')
    <h1 class="" style="">Basic Service Implementation</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Basic DataTables Service Implementation
                <small>Tutorial is available at <a href="{{ url('service') }}">{{ url('service') }}</a>.</small>
            </h3>
        </div>
        <div class="panel-body">
            {!! $dataTable->table(['class' => 'table table-bordered table-condensed']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Creating a DataTable class.</h3>
            <pre><code>php artisan datatables:make UsersDataTable</code></pre>
            <h3>Example Usage:</h3>
            <pre><code>public function getUsers(UsersDataTable $dataTable)
{
    return $dataTable->render('path.to.table.view');
}
</code></pre>
            <h3>Example View:</h3>
            <pre><code>{{ view('service.view')->render() }}</code></pre>
        </div>
    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="/js/buttons/css/buttons.dataTables.css">
<script src="/js/buttons/js/dataTables.buttons.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@stop
