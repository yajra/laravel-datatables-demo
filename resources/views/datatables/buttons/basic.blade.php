@extends('app')

@section('content')
    <h3>Server-Side TableTools/Buttons Demo</h3>
    <p>Tutorial is available at <a href="{{ url('service') }}">{{ url('service') }}</a>.</p>
    {!! $dataTable->table(['class' => 'table table-bordered table-condensed']) !!}
@endsection

@push('scripts')
<link rel="stylesheet" href="/js/buttons/css/buttons.dataTables.css">
<script src="/js/buttons/js/dataTables.buttons.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@stop
