<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;



class GoodsController extends Controller
{
/**
 * 作者: 桓超  11-17
 */
    //商品的添加
    public function getAdd()
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
    public function postInsert(Request $request)
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
        return redirect('/goods/add')->with('info','添加成功');
    }

    //商品列表 
    public function getIndex(Request $request)
    {
        $goods = DB::table('goods')->orderBy('id','desc')
                ->select('goods.*','cates.name as names')
                ->join('cates','cates.id','=','goods.cate_id')
                ->where(function($query) use($request){
                    //获取关键字内容
                    $k = $request->input('keyword');
                    if(!empty($k)){
                        $query->where('goods.name','like','%'.$k.'%');
                    }
                })->paginate($request->input('num',10));
        //解析模版  分配变量
        return view('admin.goods.index',['request'=>$request,'goods'=>$goods]);
    }

    //显示要修改的内容
    public function getEdit(Request $request)
    {
         $cates = DB::table('cates')->select(db::raw('*, concat(path,",",id) as paths'))->orderBy('paths')->get();
            foreach($cates as $k=>$v){
                $total = count(explode(',',$v->path))-1;
            if($total>0){
                $v->name = str_repeat('&nbsp;', 10*$total). '|-----'.$v->name;
            }
        }
        $id = $request->all();
        // // dd($id);
        $goods = DB::table('goods')->where('id',$id)->first();
        $pics = DB::table('pics')->get();
        return view('admin.goods.edit',['goods'=>$goods,'cates'=>$cates]);
    }

    //执行修改
    public function postDoedit(Request $request)
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
        return redirect('/admin');
    }

    //删除操作
    public function getDelete(Request $request)
    {
        $id = $request->all();
        if(!empty($id)){
            $res = DB::table('goods')->where('id',$id)->delete();
        }
        return redirect('/goods');
    }
 

}   
