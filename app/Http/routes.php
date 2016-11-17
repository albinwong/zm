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

<<<<<<< HEAD
Route::get('/test','UserController@test');


Route::get('/admin/login','CommonController@login');
Route::post('/admin/login','CommonController@dologin');

//后台路由组
Route::group(['middleware'=>'login'],function(){

	Route::get('/admin',function(){
		return view('admin');
	});

	//用户管理
	Route::controller('user','UserController');

	//分类管理
	Route::controller('cate','CateController');

	//商品管理
	Route::controller('goods','GoodsController');
});
=======

Route::get('/admin',function(){
	return view('layout.admin');
});

Route::get('/goods/add','GoodsController@add');
Route::post('/goods','GoodsController@insert');

Route::get('/home', function () {
    return view('home');
});

Route::get('/test','GoodsController@index');



>>>>>>> 58fd43743d922b94362687f5dac9e6cb8ad516ac
