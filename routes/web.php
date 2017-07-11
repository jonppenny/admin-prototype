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
Route::post('/admin/presentations/add', 'PresentationController@store');
Route::get('/admin/presentations/edit/{id}', 'PresentationController@edit');
Route::patch('/admin/presentations/edit/{id}', 'PresentationController@update');
Route::delete('/admin/presentations/delete/{id}', 'PresentationController@destroy');

Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/all', 'UserController@index');
Route::get('/admin/users/add', 'UserController@create');
Route::post('/admin/users/add', 'UserController@store');
Route::get('/admin/users/edit/{id}', 'UserController@edit');
Route::patch('/admin/users/edit/{id}', 'UserController@update');
Route::delete('/admin/users/delete/{id}', 'UserController@destroy');
