<?php
    $title = 'Laravel 5.1 with Datatables Quick Starter Tutorial';
    $description = 'Laravel 5.1 with Datatables Quick Starter Tutorial'
?>
@extends('app')

@section('content')
<style>
    li h3 { font-size: 1.2em; }
    li h4 { font-size: 1.1em; }
</style>
<h1>Laravel 5.1 with Datatables Quick Starter</h1>

<ol>
    <li>
        <h3 id="new-laravel-project"><a href="#new-laravel-project">Let's begin by creating a new Laravel project</a></h3>
        <p>
            Visit <a href="http://laravel.com/docs">Laravel's Documentation</a> for more details about creating a new project then onfigure your site.
            <pre><code>$ laravel new datatables</code></pre>
            If you're using homestead, add <strong>datatables.app</strong> on sites and update your <strong>hosts</strong> file.
            Access you new site to make sure you successfully installed and configured your Laravel site. <a href="http://datatables.app">http://datatables.app/</a>
        </p>
    </li>
    <li>
        <h3 id="migrate-seed"><a href="#migrate-seed">Let's migrate the default users table and seed some records</a></h3>
        <p>
        Run default Laravel migrations.
        <pre><code>$ cd /path/to/datatables
$ php artisan migrate</code></pre>
        Seed some users data using tinker.
        <pre><code>$ php artisan tinker
>>> factory(App\User::class, 100)->create();</code></pre>
        </p>
    </li>
    <li>
        <h3 id="install-laravel-datatables"><a href="#install-laravel-datatables">Install Laravel Datatables Package</a></h3>
        <p>
            <h4>Install using composer.</h4>
            <pre><code>$ composer require yajra/laravel-datatables-oracle</code></pre>

            <h4>Add Datatables Service Provider and Facade on <strong>config/app.php</strong>.</h4>
            <pre><code>Yajra\Datatables\DatatablesServiceProvider::class,</code></pre>
            <pre><code>'Datatables' => Yajra\Datatables\Datatables::class,</code></pre>

            <h4>Lastly, publish the configuration file.</h4>
            <pre><code>$ php artisan vendor:publish</code></pre>
        </p>
    </li>
    <li>
        <h3 id="install-assets"><a href="#install-assets">Install DataTables Assets</a></h3>
        <p>
            Install <a href="https://datatables.net/manual/installation">DataTables</a> assets on your <strong>master layout</strong> or <strong>view</strong> where you want to use it.
            <div class="input-group">
                <div class="input-group-addon">DataTables CSS</div>
                <input type="text" class="form-control" readonly="" value="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-addon">jQuery</div>
                <input type="text" class="form-control" readonly="" value="//code.jquery.com/jquery-1.10.2.min.js">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-addon">DataTables</div>
                <input type="text" class="form-control" readonly="" value="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js">
            </div>
        </p>
        <p>
            For this tutorial, let's create a master layout file for our application by creating a new file on: <strong>resources/views/layouts/master.blade.php</strong>.
            <pre><code>{{{ view('tutorials.master')->render() }}}</code></pre>
        </p>
    </li>
    <li>
        <h3 id="create-controller"><a href="#create-controller">Create a controller for DataTables application using <strong>Artisan</strong>.</a></h3>
        <pre><code>$ php artisan make:controller DatatablesController --plain</code></pre>
        <h3>Import Datatables class on our controller.</h3>
        <p>
            You can import the <strong>Datatables</strong> facade.
            <pre><code>use Datatables;</code></pre>
            Or, directly import the class to make it more IDE friendly.
            <pre><code>use Yajra\Datatables\Datatables;</code></pre>
        </p>
        <h3>Now, let's create a method to display our view and a method that will process our datatables ajax request.</h3>
        <p>
            <pre><code>{{{ view('tutorials.method')->render() }}}</code></pre>
        </p>
        <h4>Below is how our controller should look.</h4>
        <pre><code>{{{ view('tutorials.controller')->render() }}}</code></pre>
    </li>
    <li>
        <h3 id="create-view"><a href="#create-view">Let's create our View</a></h3>
            On this example, we our going to display records of our users with the following fields.
            <pre><code>users: id, name, email, created_at, updated_at</code></pre>
        <p>
            Let's create a new file for our view on <strong>resources\views\datatables\index.blade.php</strong>
            <pre><code>{{{ view('tutorials.view')->render() }}}</code></pre>
        </p>
    </li>
    <li>
        <h3 id="register-routes"><a href="#register-routes">Register <strong>datatables</strong> routes in <strong>app\Htpp\routes.php</strong></a></h3>
        <pre><code>{{{ view('tutorials.routes')->render() }}}</code></pre>
    </li>

    <li>
        <h3 id="well-done"><a href="#well-done">That's it! We can now browse our DataTables with Server Side processing with Laravel.</a></h3>
        <p>
            Browse <a href="http://datatables.app/datatables">http://datatables.app/datatables</a> and verify that your app is working.
        </p>

        <h4>Expected Output:</h4>
        <img class="thumbnail" src="{!! asset('images/tuts.png') !!}" alt="Expected Output">
    </li>
</ol>
@stop
