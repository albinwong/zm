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

		// 删除非法数据
		 foreach($data['data'] as $key =>$value){
		 	if(!isset($value['id'])){
		 		uset($data['data'][$key] );
		 	}
		 }
		// 创建信息插入订单的主表
		$info = [];
		$info['num'] = time().rand(100000,999999);
		$info['addtime'] = time();
		// 将信息插入到主表中
		$order_id = DB::table('orders') ->insertGetId($info);
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
				return redirect('/confirm?orderid= '.$orderid);
			}
		}
	}
	/**
	 * 订单确定
	 */
	public function confirm(Request $request)
	{
		// 获取用户的地址信息
		$address = DB::table('address')->where('user_id',session('uid'))->get();
		// 显示模板
		return view('home.order.confirm',['address'=>$address,'request'=>$request]);

	}
	/**
	 * 订单的确认操作
	 */
	public function doconfirm(Request $request)
	{	


		// 更新订单
		$data = $request->except(['_token','order_id']);
		
		// 修改订单状态 为已确认
		$data['status'] = 1;
		// dd($request->input('order_id'));
		
		// 更新表  
		$res = DB::table('orders')->where('id',$request->input('order_id'))->update($data);
		// 计算一下订单的总价
		$total = $this->getTotal($request->input('order_id'));
		$res = 1;
		if($res){
			// 执行成功后 跳转到支付页面进行支付
			$url ='http://pay.xiaohigh.com/api/deal?to=923299926@qq.com&money='.$total.'&order_id='.$request->input('order_id').'&info=追梦点餐&return_url=http://zm.com/order/pay';
			return redirect($url); 
		}
		
		
	}
	/**
	 * 通过订单id来计算订单的总价
	 */
	private function getTotal($order_id)
	{
		// 获取订单的商品列表
		$goods = DB::table('goods_order')->where('order_id',$order_id)->get();
		$total = 0;
		foreach($goods as $key => $value){
			// 通过商品的id获取商品的单价
			$value->price = DB::table('goods')->where('id',$value->goods_id)->value('price');
			
			$total += $value->price * $value->num;
		}
		return $total;
	}
		public function lists() 
		{
			
			// 读取订单信息
			 $orders = DB::table('orders')->where('user_id',session('uid'))->get();
			foreach($orders as $k => $v){
				$v->goods = DB::table('goods_order')->join('goods','goods.id','=','goods_order.goods_id')->where('goods_order.order_id',$v->id)->get();
			}
			// 显示模板
			 return view('home.order.list',['orders'=>$orders]);
		}
		public function delete(Request $request)
		{
			$id = $request->input('id');
			// dd($id);
	        $res = DB::table('orders')->where('id',$id)->delete();
	        // dd($res);
	        if($res){
	            return redirect('/order/index')->with('info','删除成功');
	        }else{
	            return back()->with('info','删除失败');
			}

		}
} 