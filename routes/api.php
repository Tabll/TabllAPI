<?php

use Carbon\Carbon;
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

Route::middleware('tab')->get('/info', 'Api\Info\InfoController@index');


Route::get('/test', function () {
    return 'API running：' . Carbon::now();
});

Route::get('/monitor/database-sh', 'Api\Monitor\PublicMonitorController@databaseStatusTXSH');
Route::get('/monitor/redis-sh', 'Api\Monitor\PublicMonitorController@redisStatusTXSH');
Route::get('/monitor/redis-lo', 'Api\Monitor\PublicMonitorController@redisStatusTXLO');

Route::get('/test/password', 'Api\Test\TestController@getPassword');
Route::get('/test/string/length', 'Api\Test\TestController@getStringLength');
Route::get('/test/send/mail', 'Api\Test\TestController@sendTestMail');
Route::get('/test/send/sms', 'Api\Test\TestController@sendSMS');

Route::get('/calender/simple', 'Api\Tools\CalenderController@getSimpleHoliday');
Route::get('/calender', 'Api\Tools\CalenderController@getHoliday');

Route::get('/one-word', 'Api\Tools\OneWordController@getOneWord');

Route::get('/hot-news/current', 'Api\HotNews\HotNewsController@index');

Route::get('/tool/map/convert', 'Api\Tools\MapController@convert');
