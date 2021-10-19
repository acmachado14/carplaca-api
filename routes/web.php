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


$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

    $router->group(['prefix' => 'carro'], function () use ($router) {
        $router->get('', 'CarroController@index');
        $router->post('', 'CarroController@store');
        $router->get('{id}', 'CarroController@show');
        $router->put('{id}', 'CarroController@update');
        $router->delete('{id}', 'CarroController@destroy');

        $router->get('{cdCarro}/debitos', 'DebitoController@DebitosPorCarro');
    });

    $router->group(['prefix' => 'debito'], function () use ($router) {
        $router->get('', 'DebitoController@index');
        $router->post('', 'DebitoController@store');
        $router->get('{id}', 'DebitoController@show');
        $router->put('{id}', 'DebitoController@update');
        $router->delete('{id}', 'DebitoController@destroy');
    });

});

$router->post('/api/login', 'TokenController@gerarToken');

