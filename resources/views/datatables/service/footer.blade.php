@extends('app')

@section('content')
    <h1 class="" style="">Footer Column Search</h1>
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Service Implementation with Footer Column Search</a></li>
        <li><a href="#tab2" role="tab" data-toggle="tab">Source Code</a></li>
    </ul>
    <!-- TAB CONTENT -->
    <div class="tab-content">
        <div class="active tab-pane fade in" id="tab1">
            {!! $dataTable->table([], true) !!}
        </div>
        <div class="tab-pane fade" id="tab2">
            <h2>View</h2>
            <pre><code>@{!! $dataTable->table([], true) !!}</code></pre>
            <pre><code>@{!! $dataTable->scripts() !!}</code></pre>
            <h2>UsersDataTable</h2>
            <pre><code>@include('datatables.service.usersdt')</code></pre>
        </div>
    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="/js/buttons/css/buttons.dataTables.css">
<script src="/js/buttons/js/dataTables.buttons.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@stop


