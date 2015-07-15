<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Laravel Datatables</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('starter') }}">Quick Start</a></li>
                    @include('partials.menu')
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
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
            <div class="col-sm-9 main">
                @yield('content')
            </div>
            <div class="col-sm-3 main">
                @include('donate')
                <br />
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="glyphicon glyphicon-bell"></i> Heads Up!</h3>
                    </div>
                    <div class="panel-body">
                        This package is designed to work side-by-side with <a href="https://datatables.net">DataTables.net</a> jQuery plugin. So make sure to check out the plugin's documentations.

                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="https://datatables.net/reference/option/ajax">Ajax Options</a></li>
                            <li><a href="https://datatables.net/reference/option/columns">Columns Options</a></li>
                            <li><a href="https://datatables.net/examples/index">Examples</a></li>
                            <li><a href="https://datatables.net/examples/ajax/index.html">Ajax Examples</a></li>
                            <li><a href="https://datatables.net/examples/server_side/">Server-side Processing</a></li>
                            <li><a href="https://datatables.net/extensions/index">Extensions</a></li>
                            <li><a href="https://datatables.net/forums/">Forum</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/handlebars.js') }}"></script>

    @stack('scripts')
    @if (config('analytics.enabled', false))
        @include('analytics')
    @endif
</body>
</html>
