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

// Rota para autenticar um cliente
$router->post('/auth', 'CustomerController@auth');

// Grupo de rotas para os funcionários
$router->group(['prefix' => 'orders', 'middleware' => 'auth'], function () use ($router) {
    // Rota para exibir todos os pedidos
    $router->get('/', 'OrderController@index');
    // Rota para exibir um pedido
    $router->get('/{id}', 'OrderController@show');
});