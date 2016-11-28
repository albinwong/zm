<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash; 

class AdvertController extends Controller
{
	/**
	 * 广告的添加页面
	 */
	public function getAdd()
	{
		return view('admin.advert.add');
	}

	/**
	 * 广告添加
	 */
	public function postInsert(Request $request)
	{	
		//进行表单验证
		$this->validate($request,[
			'url'=>'required|regex:/^[a-zA-z]+:\/\/[^\s]*$/|unique:frlink,url'
		],[
			'url.required'=>'连接地址不能为空',
			'url.regex'=>'连接地址格式不正确',
			'url.unique'=>'连接地址已存在'
		]);
		//获取数据
        $data = $request->except('_token');
		//处理图片
		if($request->hasFile('pics')){
			$fileName = time().rand(100000,9999999);
			$suffix = $request->file('pics')->getClientOriginalExtension();
			$fileName = $fileName.".".$suffix;
			$request->file('pics')->move('./Uploads/',$fileName);
			$data['pics'] = '/Uploads/'.$fileName;
		}

		//插入数据库
    	$res = DB::table('advert')->insert($data);
		
		//检测
		if($res){
			//跳转
			return redirect('/advert/index')->with('info','插入成功');	
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
		$advert = DB::table('advert')->orderBy('id','asc')->where(function($query) use ($request){
		//获取关键字的内容
		$k=$request->input('keyword');
		if(!empty($k)){
			$query->where('content','like','%'.$k.'%');
		}
		})->paginate($request->input('num', 10));
		//分配变量  解析模板
		return view('admin.advert.index',['advert'=>$advert,'request'=>$request]);
	}

	/**
	 * 广告的的修改页面
	 */
	public function getEdit(Request $request)
	{
		//读取当前的id的用户信息
		$id = $request->input('id');
		//读取数据库
		$advert = DB::table('advert')->where('id',$id)->first();
		//解析模板
		return view('admin.advert.edit',['advert'=>$advert]);
	}

	/**
	 * 广告的更新操作
	 */
	public function postUpdate(Request $request)
	{
		//表单验证
		//图片上传操作
		$data = $request->except(['_token','id']);
		//处理文件上传
		$path = $this->upload($request);
		if(!empty($path)){
			$data['pics'] = $path;
		}
		//更新
		$res = DB::table('advert')->where('id',$request->input('id'))->update($data);
		if($res){
			return redirect('/advert/index')->with('info','更新成功');
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
        $res = DB::table('advert')->where('id', $id) -> delete();
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