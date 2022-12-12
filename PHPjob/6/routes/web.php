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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('Post/create', 'Admin\NewsController@add');
    Route::post('Post/create', 'Admin\NewsController@create');
    Route::get('Post/create', 'Admin\NewsController@index');
    Route::get('Post/delete', 'Admin\NewsController@delete');
});



