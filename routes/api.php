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
$api->version('v1', ['middleware' => 'tab'], function ($api) {
    $api->get('/info', 'App\Http\Controllers\Api\Info\InfoController@index');
});

$api->version('v1', function ($api) {
    $api->get('/test', function () {
        \Carbon\Carbon::now();
        return 'API running：'.\Carbon\Carbon::now();
    });

    $api->get('/monitor/database-sh', 'App\Http\Controllers\Api\Monitor\PublicMonitorController@databaseStatusTXSH');
    $api->get('/monitor/redis-sh', 'App\Http\Controllers\Api\Monitor\PublicMonitorController@redisStatusTXSH');
    $api->get('/monitor/redis-lo', 'App\Http\Controllers\Api\Monitor\PublicMonitorController@redisStatusTXLO');

    $api->get('/test/password', 'App\Http\Controllers\Api\Test\TestController@getPassword');
    $api->get('/test/string/length', 'App\Http\Controllers\Api\Test\TestController@getStringLength');
    $api->get('/test/send/mail', 'App\Http\Controllers\Api\Test\TestController@sendTestMail');

    $api->get('/calender/simple', 'App\Http\Controllers\Api\Tools\CalenderController@getSimpleHoliday');
    $api->get('/calender', 'App\Http\Controllers\Api\Tools\CalenderController@getHoliday');

    $api->get('/one-word', 'App\Http\Controllers\Api\Tools\OneWordController@getOneWord');

    $api->get('/tool/map/convert', 'App\Http\Controllers\Api\Tools\MapController@convert');
});
