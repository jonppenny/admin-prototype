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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/users/all', 'AdminController@usersAll');
Route::get('/admin/users/add', 'AdminController@usersAdd');
Route::get('/admin/users/edit/{id}', 'AdminController@usersEdit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
