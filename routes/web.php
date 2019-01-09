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


Route::middleware(['install', 'role'])->group(function () {
    Route::get('/admin', 'DashboardController@index');

    Route::get('/admin/posts', 'PostController@index');
    Route::get('/admin/posts/add', 'PostController@create');
    Route::post('/admin/posts/add', 'PostController@store')->name('post.store');
    Route::get('/admin/posts/{id}/edit', 'PostController@edit');
    Route::patch('/admin/posts/{id}/update', 'PostController@update')->name('post.update');
    Route::delete('/admin/posts/{id}/delete', 'PostController@destroy')->name('post.delete');

    Route::get('/admin/users', 'UserController@index')->name('users.show');
    Route::get('/admin/users/add', 'UserController@create')->name('user.add');
    Route::post('/admin/users/add', 'UserController@store')->name('user.store');
    Route::get('/admin/users/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::patch('/admin/users/{id}/update', 'UserController@update')->name('user.update');
    Route::delete('/admin/users/{id}/delete', 'UserController@destroy')->name('user.delete');

    Route::get('/admin/settings', 'SettingsController@index');
    Route::patch('/admin/settings/update', 'SettingsController@update');

    Route::get('/admin/pages', 'PageController@index');
    Route::get('/admin/pages/add', 'PageController@create');
    Route::post('/admin/pages/add', 'PageController@store');
    Route::get('/admin/pages/{id}/edit', 'PageController@edit');
    Route::patch('/admin/pages/{id}/update', 'PageController@update');
    Route::delete('/admin/pages/{id}/delete', 'PageController@destroy');

    Route::get('/admin/menus', 'MenuController@index');
    Route::get('/admin/menus/add', 'MenuController@create');
    Route::post('/admin/menus/add', 'MenuController@store');
    Route::get('/admin/menus/{id}/edit', 'MenuController@edit');
    Route::patch('/admin/menus/{id}/update', 'MenuController@update');
    Route::delete('/admin/menus/{id}/delete', 'MenuController@destroy');
});

Route::middleware(['install'])->group(function () {
    Auth::routes();

    Route::get('/', 'HomeController@index');

    Route::get('/myprofile', 'UserController@show');
    Route::get('/post/{slug}', 'UrlController@showPost');
    Route::get('/2fa/enable', 'Google2FAController@enableTwoFactor');
    Route::get('/2fa/disable', 'Google2FAController@disableTwoFactor');
    Route::get('/2fa/validate', 'Auth\LoginController@getValidateToken');
    Route::post('/2fa/validate', ['middleware' => 'throttle:5', 'uses' => 'Auth\LoginController@postValidateToken',]);


});

Route::get('/install', 'InstallController@index');
Route::post('/install', 'InstallController@store');

// This must be last in the list
Route::get('/{slug}', 'UrlController@showPage');
