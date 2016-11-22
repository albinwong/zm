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
			'url'=>'required|regex:/^([a-zA-Z\d][a-zA-Z\d-_]+\.)+[a-zA-Z\d-_][^ ]*$/|unique:frlink,url'
		],[
			'url.required'=>'用户名不能为空',
			'url.regex'=>'用户名格式不正确',
			
		]);
        $res = $request->except('_token');
        $data = DB::table('frlink')->insert($res);
        if($data){
            return redirect('/frlink/index')->with('info','添加成功');
        }else{
            return redirect('/frlink/index')->with('info','添加失败');
        }
        
    }

		// 查看友情链接
    public function getIndex(Request $request){
        // 通过数据库查询就查询的数据传过去
        $data = DB::table('frlink')->paginate($request->input('num',10));
        // dd($data);
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


}
