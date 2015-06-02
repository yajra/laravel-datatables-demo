@extends('app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Welcome to Laravel Datatables Package Demo App</h1>
		<h2>Datatables Package for Laravel 4|5</h2>
		<p>
		<a href="https://travis-ci.org/yajra/laravel-datatables"><img src="https://camo.githubusercontent.com/16fd4e147bfa044ac37f4198b1cec2d704e99003/68747470733a2f2f696d672e736869656c64732e696f2f7472617669732f79616a72612f6c61726176656c2d646174617461626c65732e737667" alt="Build Status" data-canonical-src="https://img.shields.io/travis/yajra/laravel-datatables.svg" style="max-width:100%;"></a>
		<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://camo.githubusercontent.com/551c71812e87a48bb9646403e9b7936079655ceb/68747470733a2f2f696d672e736869656c64732e696f2f7061636b61676973742f762f79616a72612f6c61726176656c2d646174617461626c65732d6f7261636c652e737667" alt="Latest Stable Version" data-canonical-src="https://img.shields.io/packagist/v/yajra/laravel-datatables-oracle.svg" style="max-width:100%;"></a>
		<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://camo.githubusercontent.com/2e5ae2173415eb4b02d46aa0a0d4266413268d74/68747470733a2f2f696d672e736869656c64732e696f2f7061636b61676973742f64742f79616a72612f6c61726176656c2d646174617461626c65732d6f7261636c652e737667" alt="Total Downloads" data-canonical-src="https://img.shields.io/packagist/dt/yajra/laravel-datatables-oracle.svg" style="max-width:100%;"></a>
		<a href="https://github.com/yajra/laravel-datatables/blob/master/LICENSE"><img src="https://camo.githubusercontent.com/890acbdcb87868b382af9a4b1fac507b9659d9bf/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f6c6963656e73652d4d49542d626c75652e737667" alt="License" data-canonical-src="https://img.shields.io/badge/license-MIT-blue.svg" style="max-width:100%;"></a>
		<a href="https://gratipay.com/yajra/"><img src="https://camo.githubusercontent.com/2bdee9f34b106e93b30d7bffbc66037ccdafe900/68747470733a2f2f696d672e736869656c64732e696f2f67726174697061792f79616a72612e737667" alt="Support via Gratipay" data-canonical-src="https://img.shields.io/gratipay/yajra.svg" style="max-width:100%;"></a>
		<a href="https://flattr.com/submit/auto?user_id=yajra&amp;url=https://github.com/yajra/laravel-datatables&amp;title=laravel-datatables&amp;language=PHP&amp;tags=github&amp;category=software"><img src="https://camo.githubusercontent.com/739a757846f69c1cc10163619eec008e871b591b/687474703a2f2f6170692e666c617474722e636f6d2f627574746f6e2f666c617474722d62616467652d6c617267652e706e67" alt="Flattr this git repo" data-canonical-src="http://api.flattr.com/button/flattr-badge-large.png" style="max-width:100%;"></a>
		</p>
		<p>
			This package is created to handle server-side works of {!! link_to('http://datatables.net/', 'DataTables') !!} jQuery Plugin via AJAX option by using Eloquent ORM, Fluent Query Builder or Collection.
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

