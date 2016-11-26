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

//====================后台===========================
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
	//友情链接管理
	Route::controller('frlink','LinkController');

	//订单管理
	Route::controller('dlist','DlistController');

	//评价管理
	Route::controller('comment','CommonController');
	
	//广告管理
	Route::controller('advert','AdvertController');

});

//======================前台========================
/**
 * 前台首页
 */
Route::get('/', function () {
    return view('home');
});
// Route::get('/','CommonController@index');

/**
 * 前台
 */

//商品列表
Route::get('glist','HomeController@glist');
//商品详情
Route::get('detail','HomeController@detail');


//用户注册
Route::get('/register','HomeController@register');
Route::post('/doregister','HomeController@doregister');

//用户激活账号验证
Route::get('/activate','HomeController@activate');
// 找回密码
Route::get('/forget','HomeController@forget');


// 前台用户登录
Route::get('/login','HomeController@login');
Route::post('/dologin','HomeController@dologin');


// 下面我们可以设置相应的router访问这个验证码图片, 修改router.php：
Route::get('kit/captcha/{tmp}', 'KitController@captcha');

// 友情链接显示
Route::get('/links','LinkController@show');

//加入购物车操作
Route::get('/cart/add','CartController@add');
Route::get('/cart','CartController@index');


//我的订单
Route::post('/order/add','OrderController@add');
Route::get('/order/confirm','OrderController@confirm');

Route::get('/address/add','AddressController@add');

//前台评价
Route::get('/assess/add','CommonController@comment');

Route::get('test',function(){
	return view('motai');
});

