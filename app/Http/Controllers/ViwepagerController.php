<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ViwepagerController extends Controller
{
    /**
     * 添加轮播
     */
    public function getAdd()
    {
    	return view('admin.viwe.add');
    }

    public function postInsert(Request $request)
    {
    	//图片上传操作
    	$data = $request->except('_token');
		//处理文件上传
		$path = $this->upload($request);
		if(!empty($path)){
			$data['img'] = $path;
		}
		//更新
		$res = DB::table('viwepager')->insertGetId($data);
		if($res){
			return redirect('/viwe/index')->with('info','更新成功');
		}else{
			return back()->with('info','更新失败!!!');
		}
    }


    /**
     * 封装上传操作代码
     */
    private function upload($request)
    {
        if($request->hasFile('img')){
            $fileName = time().rand(100000, 999999);
            $suffix = $request->file('img')->getClientOriginalExtension();
            $fileName = $fileName.'.'.$suffix;
            $request->file('img')->move('./Uploads/', $fileName);
            $data['img'] = '/Uploads/'.$fileName;
            return $data['img'];
        }
    }

    /**
     * 轮播显示
     */
    public function getIndex(Request $request)
	{
		//读取数据
		$viwe = DB::table('viwepager')->orderBy('id','asc')->where(function($query) use ($request){
		//获取关键字的内容
		$k=$request->input('keyword');
		if(!empty($k)){
			$query->where('intro','like','%'.$k.'%');
		}
		})->paginate($request->input('num', 10));
		//分配变量  解析模板
		return view('admin.viwe.index',['viwe'=>$viwe,'request'=>$request]);
	}

	/**
	 * 轮播编辑
	 */
	public function getEdit(Request $request)
	{
		// 获取要修改的ID
		$id = $request->input('id');
		// 查找要修改的轮播数据
		$res = DB::table('viwepager')->where('id',$id)->first();

		return view('admin.viwe.edit',['res'=>$res]);
	}

	/**
	 * 轮播更新
	 */
	public function postUpdate(Request $request)
	{
		$data = $request->except(['_token','id']);
		// dd($data);
		//处理文件上传
		if($request->hasFile('img')){
            $fileName = time().rand(100000, 999999);
            $suffix = $request->file('img')->getClientOriginalExtension();
            $fileName = $fileName.'.'.$suffix;
            $request->file('img')->move('./Uploads/', $fileName);
            $data['img'] = '/Uploads/'.$fileName;
        }
		//更新
		$res = DB::table('viwepager')->where('id',$request->input('id'))->update($data);
		if($res){
			return redirect('/viwe/index')->with('info','更新成功');
		}else{
			return back()->with('info','更新失败!!!');
		}
	}

	/**
	 * 轮播删除
	 */
	public function getDelete(Request $request)
	{
		$id = $request->input('id');
		$res = DB::table('viwepager')->where('id',$id)->delete();
		if($res){
			return redirect('/viwe/index')->with('info','轮播删除成功');
		}else{
			return redirect('/viwe/index')->with('info','轮播删除成功');
		}
	}


}
