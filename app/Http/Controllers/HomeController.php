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
        // dd($request->all());
        // 表单验证
        $this->validate($request, [
            'username' =>'required|regex:/^\w{8,18}$/|unique:users,username',
            'password' => 'required|regex:/^\S{6,20}$/|same:repassword',
            'code'=>'required'
        ],[
            'username.required' => '用户名不能为空',
            'username.regex' => '用户名格式不正确',
            'password.regex'=>'密码格式不正确',
            'password.same'=>'两次密码不一致',
            'code'=>'验证码不能为空'
        ]);
        if(session('milkcaptcha')!= $request->input('code')){
            return back()->with('error','验证码输入错误');
        }
        $data = $request->except(['_token','repassword','code']);
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
            return redirect('/')->with('info','注册成功');
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
                // 重新生成用户验证码
                // $kd = str_random();
                // 更新权限
                $res = DB::table('users')->where('id',$id)->update(['auth'=>1,'kd'=>$kd]);
                return redirect('/')->with('info','恭喜您,已成功激活!');
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
    public function dologin(Request $request)
    {

        //进行表单验证
        $this->validate($request,[
            'username'=>'required|regex:/^\w{8,18}$/',
            'password'=>'required|regex:/^\S{6,20}$/',
            'code'=>'required',
        ],[
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'password.regex'=>'密码格式不正确',
            'code'=>'验证码输入错误'
        ]);
        // 验证输入的验证码
        if($request->input('code')!= session('milkcaptcha')) {
            return back()->with('error','您输入验证码错误');
        }

        //读取用户名信息
        $res = DB::table('users')->where('username',$request->input('username'))->first();
        // 检测
        if(!$res){
            return back()->with('info','您输入用户名或密码错误');;
        }else{
            //检测密码
            if(Hash::check($request->input('password'),$res->password)){
                    session(['uid' => $res->id,'uname'=>$res->username]);
                    return redirect('/');
            }else{
                return back()->with('error','您输入用户名或密码错误');;
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
     * 商品详情
     */
    public function detail($id)
    {
        if(empty(session('zuji'))){
            \Session::push('zuji','');
        }
        $track = !in_array($id,session('zuji'));
        if($track){
            \Session::push('zuji',$id);
        }
        $goods = DB::table('cates')->get();
        // 根据id读取商品详细信息
        $one = DB::table('goods')->where('id',$id)->first();
        // 读取当前这个商品的图片信息
        $pics = DB::table('pics')->where('goods_id',$id)->first();
        // dd($pics);
        $data = DB::table('comment')
                ->select('comment.*','users.username as names','users.profile')
                ->join('users','users.id','=','comment.user_id')->where('goods_id',$id)->get();
        if(!empty($one)){
            return view('home.goods.detail',['one'=>$one,'goods'=>$goods,'pics'=>$pics,'data'=>$data]);
        }else{
            return back()->withInput();
        }
    }

    /**
     * 足迹
     */
    public function track(Request $request)
    {
         $id = session('zuji');
         $track = DB::table('goods')->whereIn('id',$id)->get();
        //dd($track);
        if(!empty($track)){
          foreach($track as $k => $v){
            // $img = DB::table('pics')->where('goods_id',$v->id)->first();
            // dd($img);
             // $img = DB::table('pics')->join('goods','pics.goods_id','=','goods.id')->select('goods.*','pics.path')->first(); 
            }  
        }else{
           return back()->with('你还没有浏览商品哦');
        }
        // dd($track);
        //分配变量 解析模板
        return view('home.goods.track',['track'=>$track]);

        
    }


    /**
     * 商品列表页
     */
    public function glist(Request $request)
    {
        //读取数据
        $goods = DB::table('goods')->orderBy('id','desc')->where(function($query) use ($request){
        //获取关键字的内容
        $k=$request->input('keyword');
        if(!empty($k)){
            $query->where('name','like','%'.$k.'%');
        }
        })->orWhere(function($query) use ($request){
        //获取关键字的内容
        $j = $request->input('cate_id');
        // dd($j);
        if(!empty($j)){
            $query->where('cate_id','like','%'.$j.'%');
        }
        })->paginate($request->input('num', 20));
        $cate = DB::table('cates')->get();
        return view('home.goods.glist',['goods'=>$goods,'cate'=>$cate,'request'=>$request]);
    }

    /**
     * 密码找回
     */
    public function forget()
    {
        return view('home.user.forget');
    }


    /**
     * 密码找回验证
     */
    public function doforget(Request $request)
    {
        // 验证表单
        $this->validate($request,[
            'email'=>'required|regex:/^\w+@\w+\.\w+$/',
            'code'=>'required|regex:/^\S{4,5}$/'
            ],[
            'email.required'=>'邮箱不能为空',
            'email.regex'=>'邮箱验证输入有误',
            'code.required'=>'验证码不能为空'
            ]);
        // 确认验证码
        if(session('milkcaptcha')!= $request->input('code')){
            return back()->with('error','验证码输入有误');
        }else{
            //查询输入的邮箱是否存在
            $res = DB::table('users')->where('email',$request->input('email'))->first();
            if($res){
                 // 发送邮件
                Mail::send('home.reset', ['id'=>$res->id,'kd'=>$res->kd,'username'=>$res->username], function ($m) use ($res) {
                    $m->to($res->email, $res->username)->subject('【安全提醒】您在追梦订餐网上的账号有重置操作!');
                });
                //跳转
                return redirect('/login')->with('info','邮件已发送至您邮箱,请注意查收!');    
            }else{
                return back()->with('error','邮箱不存在!');
            }
        
        }
    }

    // 重置密码
    public function reset(Request $request)
    {
        // 接收邮箱提交的信息
        $id = $request->input('id');
        $kd = $request->input('kd');
        // 查询用户相关信息
        $res = DB::table('users')->where('id',$id)->first();
        // 判断用户的权限
        if($res->auth == 0){
            return redirect('/')->with('warning','您的账号暂未激活!');
        }else{
            if($kd != $res->kd){
                return redirect('/')->with('warning','非法请求!');
            }else{
                // 提供密码
                return view('home.user.reset',['res'=>$res]);
            }
        }
    }


    /**
     * 重置用户密码
     */
    public function doreset(Request $request)
    {
        $this->validate($request,[
            'password'=>'required|same:repassword'
            ],[
            'password.required'=>'密码不能为空',
            'repassword.same'=>'两次密码不一致'
            ]);
        $data = $request->except(['_token','repassword']);
        // 密码加密
        $data['password'] = Hash::make($request->input('password'));
        // 重新生成用户验证码
        $data['kd'] = str_random();
        // dd($data["password"]);

        $res = DB::table('users')->where('id',$data['id'])->update(['password'=>$data['password'],'kd'=>$data['kd']]);
        if($res){
            return redirect('/')->with('info','密码更新成功!');
        }else{
            return back()->with('error','密码更新失败!');
        }
    }

    /**
     * 轮播前台显示
     */
    public static function lunbo($id)
    {
        $res = DB::table('viwepager')->get();
        return $res;
    }

    /**
     * 时钟
     */
    public function clock(){
        return view('home.goods.clock');
    }


}