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
    return view('auth.login');
});

Auth::routes();

Route::get('/home/', 'HomeController@index')->name('home');
Route::get('/home/{task?}', 'HomeController@show')->name('task');
Route::post('/task/store', 'HomeController@new_task')->name('create_task');
Route::post('/home/{task?}', 'HomeController@store')->name('store_task');
Route::post('/user/create', 'UserController@store')->name('create_user');
