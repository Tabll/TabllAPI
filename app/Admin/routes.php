<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->resource('calender', 'CalendarController');
    $router->resource('one-word', 'OneWordController');

    $router->resource('hot-news/current', 'HotNewsCurrentController');
    $router->resource('hot-news/hour', 'HotNewsCurrentHourController');
    $router->resource('hot-news/history', 'HotNewsHistoryController');
});
