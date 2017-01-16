<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use PDO;
use Hash;

class CheckController extends Controller
{
    /**
     * 检测用户名是否存在
     */
    public function user(Request $request)
    {
        //创建对象
        $pdo = new PDO('mysql:host=localhost;dbname=2nd;charset=utf8','root','');

        //发送sql指令
        $stmt = $pdo->prepare('select * from users where username = ?');

        //绑定
        $arr = [$_GET['username']];

        //执行
        $stmt->execute($arr);

        //处理结果
        $res = $stmt->fetch();

        //检测
        if(empty($res)) {
            echo 1;die;
        }else{
            echo 0; die;
        }
    }

    /**
     * 检测邮箱是否存在
     */
     public function email(Request $request)
    {
        //创建对象
        $pdo = new PDO('mysql:host=localhost;dbname=2nd;charset=utf8','root','');

        //发送sql指令
        $stmt = $pdo->prepare('select * from users where email = ?');

        //绑定
        $arr = [$_GET['email']];

        //执行
        $stmt->execute($arr);

        //处理结果
        $res = $stmt->fetch();

        //检测
        if(empty($res)) {
            echo 1;die;
        }else{
            echo 0; die;
        }
    }

    /**
     * 检测密码
     */
    /*public function pwd(Request $request)
    {
        $res = DB::table('users')->lists('password');
        if(Hash::check($request->input('password'),$res->password)){
            echo 1;die;   
        }else{
            echo 0;die;
        }
    }*/

    /**
     * 检测验证码
     */
    public function code(Request $request)
    {
        // 判断
        if(session('milkcaptcha')!= $request->input('code')){
            // 不等返回1
            echo 1;die;
        }else{
            // 相等返回0
            echo 0;die;
        }
    }


}
