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
    return view('home');
});


//用户后台登录
Route::get('/admin/login','CommonController@login');
Route::post('/admin/login','CommonController@dologin');
//用户退出
Route::get('/logout','CommonController@logout');

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

/**
 * 商品列表
 */
Route::get('glist','Homecontroller@glist');

//用户注册
Route::get('register','HomeController@register');
Route::post('doregister','HomeController@doregister');
