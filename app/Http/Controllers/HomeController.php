<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    /**
     * 用户注册
     */
    public function register()
    {
        return view('home.user.register');
    }

    /**
     * 用户注册验证
     */
    public function doregister(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'username' =>'required|regex:/^\w{8,18}$/|unique:users,username',
            'password' => 'required|regex:/^\S{6,20}$/|same:repassword'
        ],[
            'username.required' => '用户名不能为空',
            'username.regex' => '用户名格式不正确',
            'password.regex'=>'密码格式不正确',
            'password.same'=>'两次密码不一致'
        ]);
        // $this->validate('');
        $res = $request->except(['_token','repassword']);
        // 生成注册时间
        $res['regtime'] = time();
        // 生成用户唯一识别码
        $res['kd'] = str_random();
        dd($res);
    }

    /**
     * 商品列表
     */
    public function glist(Request $request)
    {
         $goods = DB::table('goods')->orderBy('id','desc')
            ->select('goods.*','pics.path as paths')
            ->join('pics','goods_id','=','goods.id')
            ->get();

        $cate = DB::table('cates')->get();
        return view('home.goods.glist',['goods'=>$goods,'cate'=>$cate]);
    }

    //列表分页
    

    /**
     * 商品详情
     */
    public function detail()
    {
        dd(222);
    }


}
