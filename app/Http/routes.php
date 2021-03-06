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
Event::listen('illuminate.query',function($query){
     // var_dump($query);
 });
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
	//地址管理
	Route::controller('addr','AddrController');

	//后台留言管理
	Route::controller('msg','MsgController');

	// 轮播管理
	Route::controller('viwe','ViwepagerController');

});

//======================前台========================
/**
 * 前台首页
 */
Route::get('/', function () {
    return view('home');
});

//商品列表
Route::get('/glist','HomeController@glist');
//商品详情
Route::get('/{id}.html','HomeController@detail')->where('id','\d+');


	//订单创建
	Route::post('/order/add','OrderController@add');
	Route::get('/order/confirm','OrderController@confirm');
	Route::post('/order/confirm','OrderController@doconfirm');
	Route::get('/order/delete','OrderController@delete');
	// 订单列表
	Route::get('/order','OrderController@lists');
	Route::get('/order/lists','OrderController@lists');

	// 地址管理
	Route::get('/address/add','AddressController@add');
	Route::get('/address/get','AddressController@get');
	Route::post('/address/insert','AddressController@insert');
	// 地址的删除
	Route::get('/address/delete','AddressController@del');
	// 跳转地址的修改
	Route::get('/address/edit','AddressController@edit');
	// 执行修改
	Route::post('/address/update','AddressController@update');


	//个人中心
	Route::get('/center','UserController@center');

	//前台评价
	Route::get('/assess/add','CommonController@comment');


	//添加关注
	Route::get('/guan','GuanController@guan');

	// 前台用户查看信息
	Route::get('/selfuser/info','SelfinfoController@info');
	Route::get('/selfuser/edit','SelfinfoController@edit');
	Route::post('/selfuser/update','SelfinfoController@update');

	//地址管理
	Route::controller('addr','AddrController');

	//订单完成页面
	Route::get('/finish','OrderController@finish');

	//足迹
	Route::get('/track','HomeController@track');


//用户注册
Route::get('/register','HomeController@register');
Route::post('/register','HomeController@doregister');

//用户激活账号验证
Route::get('/activate','HomeController@activate');
// 找回密码
Route::get('/forget','HomeController@forget');
Route::post('/forget','HomeController@doforget');
// 重置密码
Route::get('/reset','HomeController@reset');
Route::post('/reset','HomeController@doreset');

// 前台用户登录
Route::get('/login','HomeController@login');
Route::post('/dologin','HomeController@dologin');


// 验证码图片
Route::get('kit/captcha/{tmp}', 'KitController@captcha');


// 友情链接显示
Route::get('/links', 'LinkController@show');

//加入购物车操作
Route::post('/cart/add','CartController@add');
Route::get('/cart','CartController@index');
Route::get('/cart/delete','CartController@delete');
<<<<<<< HEAD


=======

//订单创建
Route::post('/order/add','OrderController@add');
 Route::post('/order/confirm','OrderController@doconfirm');
 Route::get('/order/confirm','OrderController@confirm');
Route::get('/order/delete','OrderController@delete');
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd


//菜谱采集
Route::get('/caiji','CaipuController@index');

Route::get('/review','CommonController@review');
Route::post('/review','CommonController@postReview');

<<<<<<< HEAD

//留言管理
Route::controller('/notes','NotesController');
=======
// 订单列表
Route::get('/order/index','OrderController@lists');
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd

//表单验证
Route::get('/check/user','CheckController@user');
Route::get('/check/email','CheckController@email');
Route::get('/check/pwd','CheckController@pwd');

<<<<<<< HEAD

=======
//添加关注
Route::get('/guan','GuanController@guan');
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd


//关于我们
Route::controller('/us','UsController');

<<<<<<< HEAD
//常见问题
Route::get('/chang','ChangController@chang');

//关注管理
Route::get('/shouc','GuanController@shouc');

=======
// 前台用户查看信息
Route::get('/selfuser/info','SelfinfoController@info');
Route::get('/selfuser/edit','SelfinfoController@edit');
Route::post('/selfuser/update','SelfinfoController@update');

//留言管理
Route::controller('/notes','NotesController');
//关于我们
Route::controller('/us','UsController');
//前台轮播显示
Route::get('/test','HomeController@lunbo');
<<<<<<< HEAD

//表单验证
Route::get('/check/user','CheckController@user');
Route::get('/check/email','CheckController@email');
Route::get('/check/pwd','CheckController@pwd');
=======
<<<<<<< HEAD

//时钟
Route::get('/clock','HomeController@clock');

//足迹
Route::get('/track','HomeController@track');
=======
>>>>>>> dacfa8dd5aa50ff2cfb31b5437c15193c8ef0fb5
>>>>>>> f1e404c080887460c34580b77ab0f5d492bd60ec
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
