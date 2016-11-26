<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class CateController extends Controller
{
    /**
     *分类添加
     */
    public function getAdd()
    {
        //读取分类信息
        $cates = DB::table('cates')->get();
        return view('admin.cate.add',['cates'=>$cates]);
    }

    /**
     * 分类添加
     */
    public function postInsert(Request $request)
    {
        //检测
        $this->validate($request,[
            'name'=>'unique:cates,name'
        ],[
            'name.unique'=>'分类名称已经存在!!!!!!' 
        ]);
        //提取内容
        $data = $request->except(['_token']);
        //拼接path
        //判断是否为顶级分类
        if($data['pid'] == '0'){
            $data['path'] = '0';
        }else{   //如果不是顶级分类
            //读取父级分类的信息
            $p = DB::table('cates')->where('id',$data['pid'])->first();
            $data['path'] = $p->path.','.$p->id;
        }
        $res = DB::table('cates')->insert($data);
        //提醒
        if($res){
            return redirect('/cate/index')->with('info','添加成功');
        }else{
            return redirect('/cate/index')->with('info','添加失败');
        }

    }

    /**
     * 列表显示
     */
    public function getIndex(Request $request)
    {
        //读取内容
        $res = self::getCateInfo();
        //分配
        return view('admin.cate.index',['cates'=>$res,'request'=>$request]);
    }

    /**
     * 分类的修改页面
     */
    public function getEdit(Request $request)
    {
        //读取当前的分类信息
        $res = DB::table('cates')->where('id',$request->input('id'))->first();
        //读取所有的分类
        $cates = DB::table('cates')->get();
        //显示
        return view('admin.cate.edit',['cates'=>$cates,'info'=>$res]);
    }

    /**
     * 分类的更新操作
     */
    public function postUpdate(Request $request)
    {
        //获取数据
        $data = $request->except(['_token']);
        //
        if($data['pid'] == '0'){
            $data['path'] = '0';
        }else{   //如果不是顶级分类
            //读取父级分类的信息
            $p = DB::table('cates')->where('id',$data['pid'])->first();
            $data['path'] = $p->path.','.$p->id;
        }
         $res = DB::table('cates')->where('id',$data['id'])->update($data);
        //提醒
        if($res){
            return redirect('/cate/index')->with('info','修改成功');

        }else{
            return redirect('/cate/index')->with('info','修改失败');
        }
    }

    /**
     * 分类的删除操作
     */
    public function getDelete(Request $request)
    {
        //检测
        $id = $request->input('id');
        if(empty($id)) abort(404);
        //读取信息
        $info = DB::table('cates')->where('id',$id)->first();
        //拼接路径
        $path = $info->path.','.$info->id;
        //删除
        $res = DB::table('cates')->where('id',$id)->delete();
        $res2 = DB::table('cates')->where('path','like',$path.'%')->delete();

         if($res){
            return redirect('/cate/index')->with('info','删除成功');

        }else{
            return redirect('/cate/index')->with('info','删除失败');
        }
    }

    /**
     * 获取分类信息
     */
    public static function getCateInfo()
    {
        //读取内容
        $res = DB::table('cates')->select(db::raw('*,concat(path,",",id) as paths'))->orderBy('paths','asc')->get();
        //遍历
        foreach($res as $k=>$v){
            $total = count(explode(',',$v->path))-1;   //path 0,1
            if($total!=0){
                $v->name = str_repeat('&nbsp;',9*$total).'|---'.$v->name;
            }
        }
        return $res;
    
    }
    
    /**
     * 递归获取分类信息
     * 根据分类ID来获取当前分类下的子分类
     */
    public static function getAllCates($pid)
    {
        $cates = DB::table('cates')->where('pid',$pid)->get();
        // dd($cates);
        $arr = [];
        foreach($cates as $k=>$v){
            // 递归获取当前子分类
            $v->subcate = self::getAllCates($v->id);
            $arr[] = $v;
        }
        return $arr;
    }

}
