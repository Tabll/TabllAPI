<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
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
