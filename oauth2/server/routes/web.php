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
    return 'get Access Token: POST oauth/token';
});

$router->group(['middleware' => 'auth:api'], function () use ($router) {
    // $router->post('users', 'UserController@store');
    // $router->get('users', 'UserController@index');
    // $router->get('users/{id}', 'UserController@show');
    // $router->put('users/{id}', 'UserController@update');
    // $router->delete('users/{id}', 'UserController@destroy');
    $router->post('/oauth/authorization', function () use ($router) {
		return response("true", \Illuminate\Http\Response::HTTP_OK);
	});
});
