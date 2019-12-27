<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API 路由
|--------------------------------------------------------------------------
|
| 这里是应用程序注册 API 路由的地方
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['Api/info'], function () {
    //Route::get('/info', 'InfoController@index');
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/info', 'App\Http\Controllers\Api\Info\InfoController@index');
});

$api->version('v1', function ($api) {
    $api->get('/test', function () {
        \Carbon\Carbon::now();
        return 'API running：'.\Carbon\Carbon::now();
    });
});
