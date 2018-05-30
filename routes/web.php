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

Route::get('/demo', 'Demo\DemoController@index')->middleware('auth');
Route::get('/demo/list', 'Demo\DemoController@index');
Route::post('/demo/add', 'Demo\DemoController@addData')->middleware('auth');
Route::delete('/demo/{id}/del', 'Demo\DemoController@deleteData');



