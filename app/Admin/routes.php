<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', UserController::class);
    $router->resource('groups', GroupController::class);
    $router->resource('adpositionid', AdpositionidController::class);
    $router->resource('relations', RelationsController::class);
    $router->get('getGroup', 'GroupController@getGroup');
    $router->get('getUser', 'UserController@getUser');

});
