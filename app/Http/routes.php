<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('services/two-datatables', 'ServiceController@getUsersDataTables');

Route::get('services/two-datatables/posts', 'ServiceController@getPostsDataTables');

Route::controllers([
    'auth'       => 'Auth\AuthController',
    'password'   => 'Auth\PasswordController',
    'fluent'     => 'FluentController',
    'eloquent'   => 'EloquentController',
    'collection' => 'CollectionController',
    'html'       => 'HtmlBuilderController',
    'sitemap'    => 'SitemapController',
    'buttons'    => 'ButtonsController',
    'services'   => 'ServiceController',
    'relation'   => 'RelationController',
]);

Route::resource('users', 'UsersController');

Route::get('{view}', function ($view) {
    if (view()->exists($view)) {
        return view($view);
    }

    return app()->abort(404, 'Page not found!');
});
