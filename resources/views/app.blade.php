<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (isset($description))
        <meta name="description" content="{{ $description }}">
    @else
        <meta name="description" content="jQuery Datatables API for Laravel 4 and Laravel 5">
    @endif

    <title>Laravel Datatables {{ isset($title) ? " | $title" : "" }}</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datatables.bootstrap.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,800' rel='stylesheet'
          type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="{{ asset('highlight/styles/zenburn.css') }}">
    <script src="{{ asset('highlight/highlight.pack.js')  }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="dt-icon"><i class="fa fa-th-list"></i></span>
                Laravel Datatables</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="https://github.com/yajra/laravel-datatables"><strong><i class="fa fa-github"></i>
                            Github</strong></a></li>
                <li><a href="https://yajrabox.com/docs/laravel-datatables/6.0"><strong>Documentation</strong></a></li>
                <li><a href="https://www.patreon.com/bePatron?u=4521203"><strong>Become a Patreon</strong></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right navbar-custom">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 main">
            @include('partials.sidebar-menu')
            <br>
            @include('donate')
            <br>
            <div class="panel panel-info">
                @include('partials.ads',[
                    'client' => env('ADS_YAJRA_CLIENT'),
                    'slot'  => env('ADS_YAJRA_SLOT_BOX'),
                    'format'=>'auto',
                    'style'=>'display:block;'
                ])
            </div>
        </div>
        <div class="col-sm-9 main">
            @include('partials.ads',[
                'slot'=>env('ADS_VERTICAL_SLOT'),
                'format'=>'auto',
                'style'=>'display:block;'
            ])
            <div class="col-md-12">
                @yield('content')
                <hr>
                @include('partials.ads',[
                    'client' => env('ADS_YAJRA_CLIENT'),
                    'slot'  => env('ADS_YAJRA_SLOT'),
                    'format'=>'auto',
                    'style'=>'display:block;'
                ])
                <hr>
                <div id="disqus_thread"></div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables.bootstrap.js') }}"></script>
<script src="{{ asset('js/handlebars.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>
<script>
    $(function () {
        var $input = $("input[name='keyword']"), $context = $(".keyword");
        $input.on("input", function () {
            var term = $(this).val();
            $context.show().unmark();
            if (term) {
                $context.mark(term, {
                    done: function () {
                        $context.not(":has(mark)").hide();
                    }
                });
            }
        });
        $('#search-filter').focus();
    });
</script>
@stack('scripts')
@if (config('analytics.enabled', false))
    @include('analytics')
@endif
</body>
</html>
