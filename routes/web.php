<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return "This API build with ".$router->app->version();;
    });

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    

    $router->group(['middleware' => 'auth'], function () use ($router) {

        Route::get('user-profile', 'AuthController@me');
        
        $router->get('todo', 'todoController@index');
        $router->get('todo/{id}', 'todoController@show');
        $router->post('todo', 'todoController@store');
        $router->put('todo/{id}', 'todoController@update');
        $router->delete('todo/{id}', 'todoController@destroy');

        $router->get('book','BookController@index');
        $router->get('book/{id}','BookController@show');
        $router->post('book','BookController@create');
        $router->put('book/{id}','BookController@update');
        $router->delete('book/{id}','BookController@destroy');

        $router->post('article','ArticleController@store');
    });
});
