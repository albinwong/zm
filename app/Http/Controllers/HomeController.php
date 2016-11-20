<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Mail;
use Gregwar\Captcha\CaptchaBuilder;
use Session;

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
        
        $data = $request->except(['_token','repassword']);
        // 处理密码
        $data['password'] = Hash::make($data['password']);
        // 生成注册时间
        $data['regtime'] = time();
        // 生成用户唯一识别码
        $data['kd'] = str_random();
        $res = DB::table('users')->insertGetId($data);
        if($res){
             // 发送邮件
            $user = DB::table('users')->where('id',$res)->first();

            Mail::send('home.emails', ['id'=>$user->id,'kd'=>$user->kd,'username'=>$user->username], function ($m) use ($user) {
                $m->to($user->email, $user->username)->subject('您在追梦上的账号已创建，请激活您的账号!');
            });
            return redirect('/login')->with('info','注册成功');
        }else{
            //回跳
            return back()->with('info','注册失败!');
        };
    }

    /**
     * 激活账号 权限更新
     */
    public function activate(Request $request)
    {   
        $id = $request->input('id');
        $kd = $request->input('kd');
        // dd($kd);
        $res = DB::table('users')->where('id',$id)->first();
        // 判断用户的权限
        if($res->auth != 0){
            return redirect('/')->with('warning','您的账号已激活,请勿重复操作!');
        }else{
            if($kd == $res->kd){
                // 更新权限
                $res = DB::table('users')->where('id',$id)->update(['auth'=>1]);
                return redirect('/login')->with('info','恭喜您,已成功激活!');
            }else{
                return redirect('/')->with('warning','非法请求!');
            }
        }
    }

        
    /**
     * 前台用户登录
     */
    public function login(){
        $builder = new CaptchaBuilder;
        return view('home.user.login',['builder'=>$builder->build()]);
    }

    /**
     * 前台用户登录验证
     */
    public function dologin(Request $request){
        // $builder = new CaptchaBuilder;

        // $userInput = $request->get('captcha');
        // dd($userInput);
        // if($builder->testPhrase($userInput)) {
        //     //用户输入验证码正确
        //     return '您输入验证码正确';
        // } else {
        //     //用户输入验证码错误
        //     return '您输入验证码错误';
        // }
        // dd(222);
        //进行表单验证
        $this->validate($request,[
            'username'=>'required|regex:/^\w{8,18}$/',
            'password'=>'required|regex:/^\S{6,20}$/',
            'code'=>'required',
        ],[
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'password.regex'=>'密码格式不正确',
        ]);

        
        //读取用户名信息
        $res = DB::table('users')->where('username',$request->input('username'))->first();
        if(!$res){
            return back();
        }else{
            //检测密码
            if(Hash::check($request->input('password'),$res->password)){
                    session(['uid' => $res->id,'uname'=>$res->username]);
                    return redirect('/');
            }else{
                return back();
            }
        }
    }



    /**
     * 用户订单
     */
    public function order()
    {
        return view('home.user.order');
    }

    /**
     * 商品列表页
     */
    public function glist(Request $request)
    {
         $goods = DB::table('goods')->orderBy('id','desc')
            ->select('goods.*','pics.path as paths')
            ->join('pics','goods_id','=','goods.id')
            ->get();
        return view('home.goods.glist',['goods'=>$goods]);
    }

    /**
     * 购物车
     */
    public function cart()
    {
        return view('home.user.cart');
    }

}
