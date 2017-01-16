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
         $res = DB::table('cates')->select(db::raw('*, concat(path,",",id) as paths'))->orderBy('paths')->get();
            foreach($res as $k=>$v){
                $total = count(explode(',',$v->path))-1;
            if($total>0){
                $v->name = str_repeat('&nbsp;', 10*$total). '|---'.$v->name;
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

    //上下架修改
    public function getSta(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        if($status==0){
            $res = DB::table('goods')->where('id',$id)->update(['status'=>1]);
            // dd($res);
            return redirect('/goods/index')->with('info','上架成功');
        }else{
             $res = DB::table('goods')->where('id',$id)->update(['status'=>0]);
            // dd($res);
            return redirect('/goods/index')->with('info','下架成功');
        }
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
        $id = $request->input('id');
        // // dd($id);
        $goods = DB::table('goods')->where('id',$id)->first();
        $pics = DB::table('pics')->get();
        return view('admin.goods.edit',['goods'=>$goods,'cates'=>$cates]);
    }

    //执行修改
    public function postDoedit(Request $request)
    {
        $res = $request->except(['_token','path']);
        $gid = DB::table('goods')->insertGetId($res);
        if($request->hasFile('path')){
            //待拼接的数据
            $d = [];
            // 获取所有的文件对象
            $files = $request->file('path');
            foreach($files as $k=>$v){
                //拼接文件名
                $fileName = time().rand(100000,999999);
                //获取上传文件的后缀名  .jpg   getClientOriginalExtension
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
        if(!empty($id)){
            $res = DB::table('pics')->where('goods_id',$id)->delete();
        }
        return redirect('/goods');
    }

    /**
     * 热销首页
     */
    public static function rexiao($id)
    {
        $rx = DB::table('goods')->join('pics','goods.id','=','pics.goods_id')->select('goods.*','pics.path')->orderBy('sold','desc')->limit(3)->get();
        return $rx;
    }

    /**
     * 特价促销
     */
    public static function cuxiao($id)
    {
        $cx = DB::table('goods')->join('pics','goods.id','=','pics.goods_id')->select('goods.*','pics.path')->orderBy('price','asc')->limit(12)->get();
        return $cx;
    }

    /**
     * 最新商品评论
     */
    public static function tuijian($id)
    {
        $tj = DB::table('goods')->join('pics','goods.id','=','pics.goods_id')->select('goods.*','pics.path')->orderBy('views','asc')->limit(3)->get();
        return $tj;
    }
}
