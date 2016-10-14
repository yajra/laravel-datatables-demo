@extends('app')

@section('content')
<h1 class="" style="">{{ $controller . ' - ' .$title }}</h1>
<div class="tabs">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#demo">Demo</a></li>
        <li><a data-toggle="tab" href="#code">Source Code</a></li>
    </ul>
    <div class="tab-content">
         <div class="tab-pane active" id="demo">
            @yield('demo')
        </div>
        <div class="tab-pane" id="code">
            <h3 class="lead">Controller</h3>
            <pre><code>@yield('controller')</code></pre>
            <h3 class="lead">View</h3>
            <pre><code>@yield('view')</code></pre>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
@yield('js')
</script>
@endpush
