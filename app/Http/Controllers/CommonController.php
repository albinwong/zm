<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class CommonController extends Controller
{
    //显示后台登录页面
   public function login()
   {
        return view('admin.login');
   }
   
   //后台登录页面
   public function dologin(Request $request)
   {
      //读取用户名信息
      $res = DB::table('users')->where('username',$request->input('username'))->first();
        if(!$res){
          return back()->with('alert','用户名或密码不正确');
        }else{
            //检测密码
            if(Hash::check($request->input('password'),$res->password)){
                    session(['uid' => $res->id,'uname'=>$res->username,'auth'=>$res->auth]);
                    return redirect('/admin');
            }else{
                return back()->with('alert','用户名或密码不正确');
            }
        }
   }

   /**
    * 退出登录
    */
   public function logout()
   {
      session()->flush();
      return back();
   }


    /***********************后台************************************/

  /**
   * 评论管理
   */
  public function getIndex(Request $request)
  {
    //读取数据
    $comment = DB::table('comment')->orderBy('id','asc')->where(function($query) use ($request){
    //获取关键字的内容
    $k=$request->input('keyword');
    if(!empty($k)){
      $query->where('content','like','%'.$k.'%');
    }
    })->paginate($request->input('num', 10));
    //分配变量  解析模板
    return view('admin.comment.index',['comment'=>$comment,'request'=>$request]);
  }

  /**
   * 删除评论
   */
  public function getDelete(Request $request)
  {
    $id = $request->input('id');
    //执行删除
        $res = DB::table('comment')->where('id', $id) -> delete();
        if($res) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
  }

  /**
   * 前台评价
   */
  public function comment()
  {
      return view('home.comment.add');
  }

  


}