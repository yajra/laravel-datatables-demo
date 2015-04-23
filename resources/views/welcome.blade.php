@extends('app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Welcome to Laravel Datatables Package Demo App</h1>
		<h2>Datatables Package for Laravel 4|5</h2>
		<p>
		<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://poser.pugx.org/yajra/laravel-datatables-oracle/v/stable.png" alt=""></a>
		<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://poser.pugx.org/yajra/laravel-datatables-oracle/downloads.png" alt=""></a>
		<a href="https://travis-ci.org/yajra/laravel-datatables-oracle"><img src="https://travis-ci.org/yajra/laravel-datatables-oracle.png?branch=master" alt=""></a>
		<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://poser.pugx.org/yajra/laravel-datatables-oracle/v/unstable.svg" alt=""></a>
		<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://poser.pugx.org/yajra/laravel-datatables-oracle/license.svg" alt=""></a>
		</p>
		<p>
			This package is created to handle server-side works of {!! link_to('http://datatables.net/', 'DataTables') !!} jQuery Plugin via AJAX option by using Eloquent ORM or Fluent Query Builder.
		</p>
		<div class="alert alert-info">
			<strong>Note</strong> This demo app aims to guide <b>artisan developers</b> on how to use the package by examples. To begin your journey, click an example on the left menu!</p>
		</div>

		<h2>Installation</h2>
		<ul>
			<li>
				<h3>Step 1: Get the code</h3>
				<ul>
					<li>
						Option 1: Git Clone
						<br>
						<b>git clone {!! link_to('https://github.com/yajra/laravel-datatables-demo.git') !!} laravel</b>
					</li>
					<li>
						Option 2: Download the repository and extract
						<br>
						<b>{!! link_to('https://github.com/yajra/laravel-datatables-demo/archive/master.zip') !!}</b>
					</li>
				</ul>
			</li>
			<li>
				<h3>Step 2: Use Composer to install dependencies</h3>
				<ul>
					<li>cd /path/to/laravel</li>
					<li>composer install</li>
				</ul>
			</li>
			<li>
				<h3>Step: 3 Configure your database</h3>
				<ul>
					<li>Check {!! link_to('http://laravel.com/docs/5.0/configuration', 'Laravel\'s Documentation') !!} for setting up the database configuration</li>
				</ul>
			</li>
			<li>
				<h3>Step: 4 Run migrations and seeders</h3>
				<ul>
					<li>cd /path/to/laravel</li>
					<li>php artisan migrate --seed</li>
				</ul>
			</li>
			<li>
				<h3>Step 5: Start Accessing the Demo Site</h3>
			</li>
		</ul>

	</div>
</div>
@endsection

