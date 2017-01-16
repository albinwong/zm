<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SelfinfoController extends Controller
{
    public function info()
	{
		$res = DB::table('users')->where('username',session('uname'))->first();
		// dd($res);
		return view('home.user.info',['userinfo'=>$res]);
	}

	// 修改信息
	public function edit()
	{
		$res = DB::table('users')->where('username',session('uname'))->first();
		// dd($res);
		return view('home.user.edit',['useredit'=>$res]);
	}

	// 执行修改信息
	public function update(Request $request)
	{
		$this->validate($request,[
			'email'=>'required|regex:/^\w+@\w+\.\w+$/',
			'phone'=>'regex:/^1[3-8]\d{9}$/'
		],[
			'email.regex'=>'邮箱格式不正确',
			'phone.regex'=>'手机号格式不正确'
		]);
		$data = $request->except('_token','id');
		// dd($data);
		// 获取上传图像的名称
		//判断是否上传头像
		if($request->hasFile('profile')){
			$picname = $request->file('profile')->getClientOriginalName();
		// dd($picname);
		// 设置存储路径
		$request->file('profile')->move('./Uploads',$picname);
		// 将图片的信息存入data中
		$data['profile'] = '/Uploads/'.$picname;
		}
		
		//更新
		// dd($request->input('id'));
		$res = DB::table('users')->where('id',$request->input('id'))->update($data);
		
		if($res){
			return redirect('/selfuser/info')->with('info','更新成功');
		}else{
			return back()->with('info','更新失败!!!');
		}
	}
	
}
