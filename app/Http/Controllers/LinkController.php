<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// use App\Http\Requests\NetworkAddRequest;
use App\Http\Controllers\Controller;
use DB;

class LinkController extends Controller
{
	 public function getAdd(){
    	return view('admin.frlink.add');
    }
    /*
    	添加友情链接
     */
    public function postAdd(Request $request){
    	//进行表单验证
		$this->validate($request,[
			'url'=>'required|regex:/^[a-zA-z]+:\/\/[^\s]*$/|unique:frlink,url'
		],[
			'url.required'=>'连接地址不能为空',
			'url.regex'=>'连接地址格式不正确',
			'url.unique'=>'连接地址已存在'
		]);
        $res = $request->except('_token');
        // echo $res->hasFile('logo');die;

        //处理图标
        if($request->hasFile('logo')){
            $fileName = time().rand(100000,9999999);
            $suffix = $request->file('logo')->getClientOriginalExtension();
            $fileName = $fileName.".".$suffix;
            $request->file('logo')->move('./Uploads/links/',$fileName);
            $res['logo'] = '/Uploads/links/'.$fileName;
        }
        // dd($res);
        $data = DB::table('frlink')->insert($res);
        if($data){
            return redirect('/frlink/index')->with('info','添加成功');
        }else{
            return back()->with('info','添加失败');
        }
        
    }

		// 查看友情链接
    public function getIndex(Request $request){
        // 通过数据库查询就查询的数据传过去
        $data = DB::table('frlink')->orderBy('id','asc')->where(function($query) use ($request){
        //获取关键字的内容
        $k = $request->input('keyword');
        if(!empty($k)){
            $query->where('linkename','like','%'.$k.'%');
        }
        })->paginate($request->input('num', 10));
        return view('admin.frlink.index',['list'=>$data,'request'=>$request->all()]);
    }


	//友情链接修改
    public function getEdit(Request $request){
    	$id=$request->input('id');
        $data =DB::table('frlink')->where('id',$id)->first();
        // dd($data);
        return view('admin.frlink.edit',['list'=>$data]);
    }

    // 进行友情链接的修改
    public function postEdit(Request $request){
    	$id = $request->input('id');
        // dd($request);
        $res = $request->except('_token');
        // 将获得的信息更新的数据库中
        $data = DB::table('frlink')->where('id',$res['id'])->update($res);
        if($data){
            return redirect('/frlink/index')->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
        }
    }


	//删除友情链接
    public function getDelete(Request $request){
    	$id = $request->input('id');
        $res = DB::table('frlink')->where('id',$id)->delete();
        if($res){
            return redirect('/frlink/index')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }

    /**
     * 前台友情链接显示页面
     */
    public function show()
    {
        $res = DB::table('frlink')->get();
        return view('home.link',['res'=>$res]);
    }


}
