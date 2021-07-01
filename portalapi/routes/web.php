<?php

use Illuminate\Support\Facades\Route;

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

//  $router->group(['prefix'=>'api'], function(){
// $router->POST('/login', 'LoginController@index');
// $router->POST('/logout', 'LoginController@logout');
// $router->post('/register', 'AccountController@register');
// $router->post('/user', 'AccountController@index');
//});

Route::group(['prefix' => 'api'], function () {
    Route::post('/login', 'LoginController@index');
    Route::post('/logout', 'LoginController@logout');
    Route::post('/register', 'AccountController@register');
    Route::get('/user', 'AccountController@index');
});
