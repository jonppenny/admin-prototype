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

Route::get('/admin/presentations', 'PresentationController@index');
Route::get('/admin/presentations/all', 'PresentationController@index');
Route::get('/admin/presentations/add', 'PresentationController@create');
Route::post('/admin/presentations/save', 'PresentationController@store');
Route::get('/admin/presentations/{id}/edit', 'PresentationController@edit');
Route::patch('/admin/presentations/{id}/update', 'PresentationController@update');
Route::delete('/admin/presentations/{id}/delete', 'PresentationController@destroy');

Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/all', 'UserController@index');
Route::get('/admin/users/add', 'UserController@create');
Route::post('/admin/users/save', 'UserController@store');
Route::get('/admin/users/{id}/edit', 'UserController@edit');
Route::patch('/admin/users/{id}/update', 'UserController@update');
Route::delete('/admin/users/{id}/delete', 'UserController@destroy');
