@extends('app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Welcome to Laravel DataTables Demo Application</h1>
		<h2>Datatables Package for Laravel 4.2|5.0|5.1|5.2</h2>
		<p>
			<a href="http://laravel.com"><img src="https://camo.githubusercontent.com/294f3ca8f4159d1df5e2bab3773b4a52f0a6d17e/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f4c61726176656c2d342e32253743352e30253743352e31253743352e322d6f72616e67652e737667" alt="Laravel 4.2|5.0|5.1|5.2" data-canonical-src="https://img.shields.io/badge/Laravel-4.2%7C5.0%7C5.1%7C5.2-orange.svg" style="max-width:100%;"></a>
			<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://camo.githubusercontent.com/d898c7f939eac02bf772378e02ac69e075985fb1/68747470733a2f2f706f7365722e707567782e6f72672f79616a72612f6c61726176656c2d646174617461626c65732d6f7261636c652f762f737461626c65" alt="Latest Stable Version" data-canonical-src="https://poser.pugx.org/yajra/laravel-datatables-oracle/v/stable" style="max-width:100%;"></a>
			<a href="https://travis-ci.org/yajra/laravel-datatables"><img src="https://camo.githubusercontent.com/574f521b88f6050fcf5c5b2737012255b73d9121/68747470733a2f2f7472617669732d63692e6f72672f79616a72612f6c61726176656c2d646174617461626c65732e7376673f6272616e63683d6d6173746572" alt="Build Status" data-canonical-src="https://travis-ci.org/yajra/laravel-datatables.svg?branch=master" style="max-width:100%;"></a>
			<a href="https://scrutinizer-ci.com/g/yajra/laravel-datatables/?branch=master"><img src="https://camo.githubusercontent.com/1fdea8c5ab580abaa9281abef75349b5fb4b7ec9/68747470733a2f2f7363727574696e697a65722d63692e636f6d2f672f79616a72612f6c61726176656c2d646174617461626c65732f6261646765732f7175616c6974792d73636f72652e706e673f623d6d6173746572" alt="Scrutinizer Code Quality" data-canonical-src="https://scrutinizer-ci.com/g/yajra/laravel-datatables/badges/quality-score.png?b=master" style="max-width:100%;"></a>
			<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://camo.githubusercontent.com/8e80fd4347d45cdba5b9d0032050c141b7d8a0ae/68747470733a2f2f706f7365722e707567782e6f72672f79616a72612f6c61726176656c2d646174617461626c65732d6f7261636c652f646f776e6c6f616473" alt="Total Downloads" data-canonical-src="https://poser.pugx.org/yajra/laravel-datatables-oracle/downloads" style="max-width:100%;"></a>
			<a href="https://packagist.org/packages/yajra/laravel-datatables-oracle"><img src="https://camo.githubusercontent.com/895c1b47301f29ffa222a5e36efc87962c70010a/68747470733a2f2f706f7365722e707567782e6f72672f79616a72612f6c61726176656c2d646174617461626c65732d6f7261636c652f6c6963656e7365" alt="License" data-canonical-src="https://poser.pugx.org/yajra/laravel-datatables-oracle/license" style="max-width:100%;"></a>
		</p>
		<p>
			This package is created to handle server-side works of {!! link_to('http://datatables.net/', 'DataTables') !!} jQuery Plugin via AJAX option by using Eloquent ORM, Fluent Query Builder or Collection.
		</p>

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
				<h3>Step 3: Perform deafult commands for new projects</h3>
				<ul>
					<li>php -r "copy('.env.example', '.env');"</li>
					<li>php artisan key:generate</li>
				</ul>
			</li>
			<li>
				<h3>Step 4: Configure your database</h3>
				<ul>
					<li>Check {!! link_to('https://laravel.com/docs/5.1/database#configuration', 'Laravel\'s Documentation') !!} for setting up the database configuration</li>
				</ul>
			</li>
			<li>
				<h3>Step 5: Run migrations and seeders</h3>
				<ul>
					<li>cd /path/to/laravel</li>
					<li>php artisan migrate --seed</li>
				</ul>
			</li>
			<li>
				<h3>Step 6: Start Accessing the Demo Site</h3>
			</li>
		</ul>

	</div>
</div>
@endsection

