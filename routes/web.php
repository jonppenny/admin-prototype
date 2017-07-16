<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'DashboardController@index');

Route::get('/admin/posts', 'PostController@index');
Route::get('/admin/posts/all', 'PostController@index');
Route::get('/admin/posts/add', 'PostController@create');
Route::post('/admin/posts/save', 'PostController@store');
Route::get('/admin/posts/{id}/edit', 'PostController@edit');
Route::patch('/admin/posts/{id}/update', 'PostController@update');
Route::delete('/admin/posts/{id}/delete', 'PostController@destroy');

Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/all', 'UserController@index');
Route::get('/admin/users/add', 'UserController@create');
Route::post('/admin/users/save', 'UserController@store');
Route::get('/admin/users/{id}/edit', 'UserController@edit');
Route::patch('/admin/users/{id}/update', 'UserController@update');
Route::delete('/admin/users/{id}/delete', 'UserController@destroy');
