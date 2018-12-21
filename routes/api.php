<?php

use function foo\func;
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

Route::get('/users', 'ApiController@getUsers');
Route::get('/user/{id}', 'ApiController@getUserByID');
Route::delete('/user/{id}/delete', function () {
    return json_encode(["status" => "success"]);
});
