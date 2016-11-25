<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class AddressController extends Controller
{
	/**
	 * 添加
	 */
	public function add()
	{
		return view('home.address.add');
	}
	public function insert(Request $request)
	{ 
		// 数据检测
		// 插入数据库
		$data = $request->except(['_token']);
		

		$data['user_id'] = session('uid');
		// 执行插入
		$res = DB::table('address')->insert($data);
		// 检测
		if($res){
			return back()->with('info','地址添加成功');
		}else{
			return back()->with('info','地址添加失败');
		}
	}

	/**
	*	根据pid获取区域信息
	 */
	public function get(Request $request)
	{
		$id = $request->input('pid');
		// 读取数据库
		$address = DB::table('destoon_area')->orderBy('areaid','asc')->where('parentid',$id)->get();
		// 返回结果
		return response()->json($address);
		
	}
	
}	