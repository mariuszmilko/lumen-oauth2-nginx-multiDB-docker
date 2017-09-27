<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return redirect('/login');
});

$router->get('/login', function () use ($router) {
	return storage_path('framework/cache');
});

$router->group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () use ($router) {
    $router->get('version', function () {
        return 'api.v1';
    });
    $router->get('user', 'ExampleController@show');
});
