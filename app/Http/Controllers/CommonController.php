<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class CommonController extends Controller
{
    //显示登录页面
   public function login()
   {
        return view('admin.login');
   }
   
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

  


}