<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class MsgController extends Controller
{
    /**
     * 后台留言管理页面
     */
    public function getIndex(Request $request)
    {
        // 查询留言
        $res = DB::table('notes')->orderBy('id','asc')->where(function($query) use ($request){
        //获取关键字的内容
        $k=$request->input('author');
        if(!empty($k)){
            $query->where('mid','like','%'.$k.'%');
        }
        })->paginate($request->input('num', 10));
        return view('admin.notes.index',['res'=>$res,'request'=>$request]);
    }

     /**
     * 编辑回复留言
     */
    public function getEdit(Request $request)
    {
        // 获取要修改的id号
        $id = $request->input('id');
        // 获取留言的详细信息
        $data = DB::table('notes')->where('id',$id)->first();
        return view('admin.notes.edit',['data'=>$data]);
    }

    // 管理员回复
    public function postUpdate(Request $request)
    {
    	// 获取要回复的信息内容
        $data = $request->except(['_token','id']);
        // 更改管理员回复内容
        $res = DB::table('notes')->where('id',$request->input('id'))->update($data);
        // 判断回复是否成功
        if($res){
        	return redirect('/msg')->with('info','回复成功!');
        }else{
        	return back()->with('warning','回复失败!');
        }
    }


    /**
     * 删除留言
     */
    public function getDelete(Request $request)
    {
        // 获取要删除的留言的ID号
        $id = $request->input('id');
        // 执行删除
        $res = DB::table('notes')->where('id',$id)->delete();
        // 判断结果
        if($res){
            return redirect()->with('info','留言删除成功!');
        }else{
            return back()->with('warning','留言删除失败!');
        }
    }
}
