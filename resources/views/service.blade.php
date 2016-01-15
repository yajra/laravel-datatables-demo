@extends('app')

@section('content')
    <h1>DataTables as a Service Implementation</h1>
    <p>
        <h3>Why use this approach?</h3>
        <p>Some of the reasons are:</p>
        <ul>
            <li>Built-in support for DataTables Buttons (server-side processing).</li>
            <li>Smaller footprint for our controller.</li>
            <li>Artisan command available for creating our service.</li>
            <li>etc...</li>
        </ul>
    </p>
    <div class="alert alert-warning">
        <strong>Note:</strong> This tutorial assumes that you are already familiar with the basic setup/usage of the package.
        If not, it is recommended that you check <a href="/starter">Quick Start</a> tutorial first.
    </div>

    <h3>Requirements</h3>
    <ul>
        <li>Laravel 5.0 | 5.1 | 5.2</li>
        <li><a href="https://github.com/yajra/laravel-datatables/tree/6.0">yajra/laravel-datatables-oracle:~6.0</a></li>
        <li>DataTables Buttons assets: <a href="http://datatables.net/extensions/buttons/">http://datatables.net/extensions/buttons/</a></li>
    </ul>

    <div class="alert alert-info">
        <p>After package installation, don't forget to execute: <strong>php artisan vendor:publish --tag=datatables</strong> to publish the assets.</p>

        <p>For datatables, these files will be published:</p>
        <ol>
            <li>public/vendor/datatables/buttons.server-side.js</li>
            <li>resources/views/vendor/datatables/print.blade.php</li>
            <li>config/datatables.php</li>
        </ol>
    </div>

    <h3>Displaying users data by using DataTable Service</h3>
    <ol>
        <li>
            <h4>Let's start by creating our UsersDataTable</h4>
            <pre><code>php artisan datatables:make UsersDataTable</code></pre>
            <p>
                This will create a file: <strong>App\DataTables\UsersDataTable</strong> class with the following methods:
            <ol>
                <li>
                    <strong>ajax()</strong> - which will handle the ajax response to our datatable
                </li>
                <li>
                    <strong>query()</strong> - which will be used to build our base query object.
                </li>
                <li>
                    <strong>html()</strong> - an optional method that we can use if we want to utilize the Html\Builder of Datatables.
                </li>
            </ol>
            </p>
        </li>

        <li>
            <h4>Build UsersDataTable class</h4>
            <ol>
                <li>
                    <h5>Build ajax() method.</h5>
                    <p>The default stub for ajax method is already usable and we can already leave this as is.</p>
<pre><code>public function ajax()
{
    return $this->datatables
        ->eloquent($this->query())
        ->make(true);
}
</code></pre>
                </li>

                <li>
                    <h5>Build query() method.</h5>
                    <p>
                        We will also use the default stub for this method since we are dealing with User model.
                    </p>
<pre><code>public function query()
{
    $users = User::select();

    return $this->applyScopes($users);
}
</code></pre>
                </li>

                <li>
                    <h5>Build html() method.</h5>
                    <p>
                        We will add the columns that we want to display on our datatable. We will also include the buttons and display it in dom.
                    </p>
<pre><code>public function html()
{
    return $this->builder()
        ->columns([
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ])
        ->parameters([
            'dom' => 'Bfrtip',
            'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
        ]);
}
</code></pre>
                </li>
            </ol>
        </li>

        <li>
            <h4>Let's create our controller</h4>
            <pre><code>php artisan make:controller UsersController --plain</code></pre>
            <p>We will add the index method and inject our UsersDataTable class. Afterwards, we will render our view using our service.</p>
            <pre><code>{{ view('service.controller')->render() }}</code></pre>
        </li>

        <li>
            <h4>Let's create our view for our datatables.</h4>
            <p>
                Create a file on <strong>resources/views/users.blade.php</strong>
            </p>
            <p><strong>Note</strong>: <em>buttons.server-side.js</em> is included in the package.</p>
            <pre><code>{{ view('service.view')->render() }}</code></pre>
        </li>

        <li>
            <h4>Register our route and test!</h4>
            <pre><code>Route::resource('users', 'UsersController');</code></pre>

            <h5>Expected output:</h5>
            <img src="{{ asset('images/tuts-service.png') }}" alt="tuts">
        </li>
    </ol>
@stop
