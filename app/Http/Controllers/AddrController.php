<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddrController extends Controller
{
	// 显示地址列表
	 public function getIndex(Request $request)
    {   
       $order_id=$request->input('order_id');
		// dd($order_id);
		// 获取用户的地址信息
		$address = DB::table('address')->where('user_id',session('uid'))->paginate($request->input('num',10));
        
       return view('admin.addr.index',['order_id'=>$order_id,'address'=>$address,'request'=>$request]);
    
	}
	
	

}