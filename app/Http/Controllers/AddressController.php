<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
		$this->validate($request,[
			
			'number'=>'regex:/^1[3-8]\d{9}$/'
			],[
			
			'number.regex'=>'手机号格式不正确'
			]);
		// 数据检测
		// 插入数据库 
		$data = $request->except(['_token']);
		// dd($data);

		$data['user_id'] = session('uid');
		// 执行插入
		$res = DB::table('address')->insert($data);
		// 检测
		if($res){
			return redirect('/order/confirm')->with('info','地址添加成功');
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
	// 地址的删除
	public function del(Request $request)
	{ 
		$id = $request->input('id');
		
        $res = DB::table('address')->where('id',$id)->delete();
        if($res){
            return redirect('/order/confirm')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
		}
	}

	// 地址修改跳转
	public function edit(Request $request){
		$id=$request->input('id');
        $data =DB::table('address')->where('id',$id)->first();
        // dd($data);
        return view('home.address.edit',['addr'=>$data]);
	}
	// 地址的修改
	public function update(Request $request)
	{
		$data = $request->except(['_token']);
		// dd($data);
		// 判断用户是否修改了地址,如果修改了的话就更新数据,如果没修改那就不要写入数据,
		// 这样写是因为不判断,语句将会把数据库的数据清空
		if(empty($data['sheng']) || empty($data['shi']) || empty($data['xian'])){
			// 执行用户地址的修改(修改固定字段)
			// 获取需要的指定字段
			$sm = $request->except(['_token','sheng','shi','xian']);
			// dd($sm);
			$id = $request->input('id');

			$res = DB::table('address')->where('id',$id)->update($sm);
			return redirect('/order/confirm')->with('info','修改地址成功');
		}else{
			// 执行用户地址的修改
			$id = $request->input('id');
			$res = DB::table('address')->where('id',$id)->update($data);
			return redirect('/order/confirm')->with('info','修改地址成功');
		}
		
	}
}