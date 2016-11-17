<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash; 

class UserController extends Controller
{
	/**
	 * 用户的添加页面
	 */
	public function getAdd()
	{
		return view('admin.user.add');

	}

	/**
	 * 用户的插入动作
	 */
	public function postInsert(Request $request)
	{	
		//进行表单验证
		$this->validate($request,[
			'username'=>'required|regex:/^\w{8,18}$/|unique:users,username',
			'password'=>'required|regex:/^\S{6,20}$/|same:repassword',
			'email'=>'regex:/^\w+@\w+\.\w+$/',
			'phone'=>'regex:/^[3-8]\d{9}$/'
		],[
			'username.required'=>'用户名不能为空',
			'username.regex'=>'用户名格式不正确',
			'password.regex'=>'密码格式不正确',
			'password.same'=>'两次密码不一致',
			'email.regex'=>'邮箱格式不正确',
			'phone.regex'=>'手机号格式不正确'
		]);

		//获取数据
		$data = $request->except(['repassword','_token']);
		//加密密码
		$data['password'] = Hash::make($data['password']);
		//处理头像
		if($request->hasFile('profile')){
			$fileName = time().rand(100000,9999999);
			$suffix = $request->file('profile')->getClientOriginalExtension();
			$fileName = $fileName.".".$suffix;
			$request->file('profile')->move('./Uploads/',$fileName);
			$data['profile'] = '/Uploads/'.$fileName;
		}

		//插入数据库
    	$res = DB::table('users')->insert($data);
		
		//检测
		if($res){
			//跳转
			return redirect('/user/index')->with('info','插入成功');	
		}else{
			//回跳
			return back()->with('info','插入失败!!!!!!!!!!!!!!!!');
		}
	}
	
	/**
	 * 列表显示功能
	 */
	public function getIndex(Request $request)
	{
		//读取数据
		$users = DB::table('users')->orderBy('id','asc')->where(function($query) use ($request){
		//获取关键字的内容
		$k=$request->input('keyword');
		if(!empty($k)){
			$query->where('username','like','%'.$k.'%');
		}
		})->paginate($request->input('num', 10));
		//分配变量  解析模板
		return view('admin.user.index',['users'=>$users,'request'=>$request]);
	}

	/**
	 * 用户的修改页面
	 */
	public function getEdit(Request $request)
	{
		//读取当前的id的用户信息
		$id = $request->input('id');
		//读取数据库
		$user = DB::table('users')->where('id',$id)->first();
		//解析模板
		return view('admin.user.edit',['user'=>$user]);
	}

	/**
	 * 用户的更新操作
	 */
	public function postUpdate(Request $request)
	{
		//表单验证
		//图片上传操作
		$data = $request->except(['_token','id']);
		//处理文件上传
		$path = $this->upload($request);
		if(!empty($path)){
			$data['profile'] = $path;
		}
		//更新
		$res = DB::table('users')->where('id',$request->input('id'))->update($data);
		if($res){
			return redirect('/user/index')->with('info','更新成功');
		}else{
			return back()->with('info','更新失败!!!');
		}
	}

	/**
	 * 删除操作
	 */
	public function getDelete(Request $request)
	{
		$id = $request->input('id');
		//执行删除
        $res = DB::table('users')->where('id', $id) -> delete();
        if($res) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
	}
	 /**
     * 封装上传操作代码
     */
    private function upload($request)
    {
        if($request->hasFile('profile')){
            $fileName = time().rand(100000, 999999);
            $suffix = $request->file('profile')->getClientOriginalExtension();
            $fileName = $fileName.'.'.$suffix;
            $request->file('profile')->move('./Uploads/', $fileName);
            $data['profile'] = '/Uploads/'.$fileName;
            return $data['profile'];
        }
    }


}