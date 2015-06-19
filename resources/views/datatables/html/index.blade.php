@extends('app')

@section('content')
<h3 class="page-header">DataTable Html Builder</h3>
<div class="row">
    <div class="col-sm-6">
        <h4>Requirements</h4>
        <table class="table">
            <tr>
                <th>Laravel Version</th>
                <th>Required Package</th>
                <th>Datatables Package</th>
            </tr>
            <tr>
                <td>Laravel 5.0</td>
                <td>laravelcollective/html: 5.0.*</td>
                <td>yajra/laravel-datatables-oracle: ~5.4</td>
            </tr>
            <tr>
                <td>Laravel 5.1</td>
                <td>laravelcollective/html: 5.1.*</td>
                <td>yajra/laravel-datatables-oracle: ~5.4</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h4>Quick Start</h4>
        <ol>
            <li>
                Import class <strong>use yajra\Datatables\Html\Builder;</strong> on your controller
            </li>
            <li>
                Use it via <strong>Dependency or Method Injection</strong>.
                <pre><code>
                    protected $htmlBuilder;

                    public function __construct(Builder $htmlBuilder)
                    {
                        $this->htmlBuilder = $htmlBuilder;
                    }

                    public function getIndex(Request $request, Builder $htmlBuilder){}
                </code></pre>
                You can also use <strong>Service Injection</strong> on Laravel 5.1:
                <pre><code>{{ "@inject('datatables', 'yajra/Datatables/Html/Builder')" }}</code></pre>
            </li>
            <li>
                Build your DataTable Html
                <pre><code>
                    $datatables = $htmlBuilder
                        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
                        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
                        ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
                        ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
                        ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'])
                        ->ajax(route('users.data'));

                    return view('datatables.html.method', compact('datatables'));
                </code></pre>
            </li>
            <li>
                On your view, render the generated table using:
                <pre><code>@{!! $datatables->table() !!}</code></pre>
                And render the generated javascripts using:
                <pre><code>@{!! $datatables->scripts() !!}</code></pre>
            </li>
        </ol>
    </div>
</div>
@endsection