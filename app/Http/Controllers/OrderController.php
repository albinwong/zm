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
	public function add(Request $request)
	{
		
		// 获取数据
		$data = $request->except(['_token']);

		// 删除非法数据
		 foreach($data['data'] as $key =>$value){
		 	if(!isset($value['id'])){
		 		unset($data['data'][$key] );
		 	}
		 }
		// 创建信息插入订单的主表
		$info = [];
		$info['num'] = time().rand(100000,999999);
		$info['addtime'] = time();
		$info['user_id']=session('uid');
		// 将信息插入到主表中
		$order_id = DB::table('orders') ->insertGetId($info);
		if($order_id){
			foreach($data['data'] as $k=>$v){
				$tmp = [];
				$tmp['goods_id'] = $v['id'];
				$tmp['num'] = $v['num']; 
				$tmp['order_id'] = $order_id;
				$d[] = $tmp;
			}
			// 向订单和商品的关联表中插入数据
			$res = DB::table('goods_order')->insert($d);
			// 如果插入成功,跳转订单确认页面
			if($res){
				return redirect('/order/confirm?orderid= '.$order_id);
			}
		}
	}
	/**
	 * 订单确定
	 */
	public function confirm(Request $request)
	{	
		$order_id = $request->input('orderid');
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
		// 更新表  
		$res = DB::table('orders')->where('id',$request->input('order_id'))->update($data); 
		
		$res=1;

		// 计算一下订单的总价
		$total = $this->getTotal($request->input('order_id'));
		// dd($total);
		if($res){
			// 执行成功后 跳转到支付页面进行支付
			$url ='http://pay.xiaohigh.com/api/deal?to=18331016095@163.com&money='.$total.'&order_id='.$request->input('order_id').'&info=追梦点餐&return_url=http://zm.com/finish';

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
		
		 foreach($goods as $k=>$v)
        {   
            //通过商品id获取商品的单价
            $good =DB::table('goods')->where('id',$v->goods_id)->first();

            $v->price=$good->price;
            $total +=$v->price * $v->num;
        }

        return $total;
	}

	// 完成订单
	public function finish(Request $request)
    {   
        $res=DB::table('orders')->where('id',$request->input('order_id'))->update(['status'=>1]);
        
        if($res){
            return redirect('/glist')->with('info','支付已成功');
        }else{
            return redirect('/glist')->with('info','支付失败');
        }
    }
	 
	// 获取订单列表
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
		
	// 删除订单
	public function delete(Request $request)
	{
		 $res=DB::table('orders')->where('id',$request->input('id'))->delete();
    	$res1=DB::table('goods_order')->where('order_id',$request->input('id'))->delete();

    	if($res && $res1 ){
        	echo true;
    	}else{
        	echo false;
    	}
	}	

	
} 
