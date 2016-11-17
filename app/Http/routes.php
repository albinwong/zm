<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin',function(){
	return view('layout.admin');
});

Route::get('/goods/add','GoodsController@add');
Route::post('/goods','GoodsController@insert');

Route::get('/home', function () {
    return view('home');
});

Route::get('/test','GoodsController@index');



