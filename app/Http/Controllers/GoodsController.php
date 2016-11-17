<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class GoodsController extends Controller
{
    //商品的添加
    public function add()
    {
        //读取分类信息
        // $res = CateController::getCateInfo();
         $res = DB::table('cates')->select(db::raw('*, concat(path,",",id) as paths'))->orderBy('paths')->get();
            foreach($res as $k=>$v){
                $total = count(explode(',',$v->path))-1;
            if($total>0){
                $v->name = str_repeat('&nbsp;', 10*$total). '|-----'.$v->name;
            }
        }
        //解析模版   分配变量
        return view('admin.goods.add',['cates'=>$res]);
    }

    //执行添加
    public function insert(Request $request)
    {
        $res = $request->except(['_token','path']);
        // $res['color'] = implode('@',$res['color']);
        // $res['size'] = implode('@',$res['size']);
        $gid = DB::table('goods')->insertGetId($res);
        if($request->hasFile('path')){
            //待拼接的数据
            $d = [];
            // 获取所有的文件对象
            $files = $request->file('path');
            foreach($files as $k=>$v){
                //拼接文件名
                $fileName = time().rand(100000,999999);
                //获取上传文件的后缀名  .jpg
                $suffix = $v->getClientOriginalExtension();
                //拼接文件名
                $fileName = $fileName.'.'.$suffix;
                //目录
                $dir = './Uploads/'.date('Ymd').'/';
                $v->move($dir,$fileName);
                //拼接ok的图片路径(绝对路径)
                $tmp['path'] = trim($dir.$fileName,'.');
                $tmp['goods_id'] = $gid;
                $d[] = $tmp;

                $filed = DB::table('pics')->insert($d);

            }
        }

    }

    public function cates()
    {
        return view('admin.goods.cates');
    }

 

}   
