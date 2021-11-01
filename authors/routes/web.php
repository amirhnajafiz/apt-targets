<?php

/** @var Router $router */

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

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('authors',  ['uses' => 'AuthorController@index']);

    $router->get('authors/{id}', ['uses' => 'AuthorController@show']);

    $router->post('authors', ['uses' => 'AuthorController@store']);

    $router->delete('authors/{id}', ['uses' => 'AuthorController@destroy']);

    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});
