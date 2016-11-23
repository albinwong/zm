<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
 

class OrderController extends Controller
{
	/*
		创建订单操作
	*/
	public function add(Requery $request)
	{
		// 获取数据
		$data = $request->except(['_token']);
		// 创建信息插入订单的主表
		$info = [];
		$info['num'] = time().rand(100000,999999);
		$info['addtime'] = time();
		// 将信息插入到主表中
		$order_id = DB::table('order')->insertGetId($info);
		if($order_id){
			foreach($data['data'] as $k=>$v){
				$tmp = [];
				$tmp['good_id'] = $v['id'];
				$tmp['num'] = $v['num'];
				$tmp['order_id'] = $order_id;
				$d[] = $tmp;
			}
			// 向订单和商品的关联表中插入数据
			$res = DB::table('good_order')->insert($id);
			// 如果插入成功,跳转订单确认页面
			if($res){
				return redirect('/Order/confirm?orderid= '.$orderid);
			}
		}
	}
	/**
	 * 订单确定
	 */
	public function confirm()
	{
		// 显示模板
		return view('home.order.confirm');
	}
}