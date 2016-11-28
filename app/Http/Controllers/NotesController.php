<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class NotesController extends Controller
{

    /**
     * 添加留言
     */
    public function getAdd()
    {
    	return view('home.notes.add');
    }



    /**
     * 插入留言
     */
    public function postAdd(Request $request)
    {
    	//进行表单验证
		$this->validate($request,[
			'email'=>'required|regex:/^\w+@\w+\.\w+$/',
			'title'=>'required',
			'content'=>'required',
			'tel'=>'regex:/^1[3-8]\d{9}$/'
		],[
			'email.required'=>'邮箱不能为空',
			'email.regex'=>'邮箱格式不正确',
			'tel.regex'=>'手机号格式不正确',
			'title.regex'=>'标题不能为空',
			'content.regex'=>'内容不能为空'
		]);
		if(session('milkcaptcha')!= $request->input('code')){
            return back()->with('error','验证码输入错误');
        }
        // 处理数据
    	$data = $request->except(['_token','code']);
    	$data['ip'] = $request->getClientIp();
    	$data['date'] = time();
    	$data['mid'] =  date('Ymd',time()).rand(1000, 9999);
    	// 插入数据库
    	$id = DB::table('notes')->insertGetId($data);
    	if($id){
    		return redirect('/notes/show')->with('info','留言添加成功');
    	}else{
    		return back()->with('error','留言添加失败');
    	}
    }

    
    /**
     * 显示留言
     */
    
    public function getShow(Request $request)
    {
    	// 查询留言
    	$res = DB::table('notes')->orderBy('id','desc')->where(function($query) use ($request){
		//获取关键字的内容
		$k=$request->input('keyword');
		if(!empty($k)){
			$query->where('username','like','%'.$k.'%');
		}
		})->paginate($request->input('num', 10));
    	return view('home.notes.index',['res'=>$res,'request'=>$request]);
    }

    /**
     * 后台管理页面
     */
    public function getIndex(Request $request)
    {
        // 查询留言
        $res = DB::table('notes')->orderBy('id','desc')->where(function($query) use ($request){
        //获取关键字的内容
        $k=$request->input('keyword');
        if(!empty($k)){
            $query->where('username','like','%'.$k.'%');
        }
        })->paginate($request->input('num', 10));
        return view('admin.notes.index',['res'=>$res,'request'=>$request]);
    }

    /**
     * 编辑回复留言
     */
    public function getEdit(Request $request)
    {

    }


    /**
     * 删除留言
     */
    public function getDetele(Request $request)
    {

    }

}
