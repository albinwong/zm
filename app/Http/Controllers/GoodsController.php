<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
	/**
	 * 商品的添加
	 */
	public function getAdd()
	{
		//读取分类信息
		$res = CateController::getCateInfo();
		
		//解析模板  分配变量
		return view('admin.goods.add',['cates'=>$res]);
	}

	/**
	 * 商品的插入
	 */
	public function postInsert(Request $request)
	{
		//提取数据
		$data = $request->except(['_token','path']);
		
		//将数据插入到主表中
		$gid = DB::table('goods')->insertGetId($data);
		// 处理图片
		if($request -> hasFile('path')){
			//待拼接的数据
			$d = [];
			//获取所有的文件对象
			$files = $request->file('path');
			foreach ($files as $k => $v) {
				$fileName = time().rand(100000,9999999);
				$suffix = $v->getClientOriginalExtension();
				//拼接文件名
				$fileName = $fileName.".".$suffix;
				//目录
				$dir = './Uploads/'.date('Ymd').'/';
				$v->move($dir,$fileName);
				//拼接图片路径 (绝对路径)
				$tmp['path'] = trim($dir.$fileName,'.');
				$tmp['goods_id'] = $gid;
				$d[] = $tmp;

			}
			//将图片信息插入到附加表中
			$res = DB::table('pics')->insert($d);
			if($res && $gid){
				return redirect('/goods/index')->with('info','添加成功');
			}else{
				return back()->with('info','添加失败!!!!');
			}
		}
		if($gid){
			//跳转
			return redirect('/goods/index')->with('info','添加成功');	
		}else{
			//回跳
			return back()->with('info','添加失败!!!!');
		}	
	}

	/**
	 * 列表显示
	 */
	public function getIndex(Request $request)
	{
		//读取数据
		$goods = DB::table('goods')->orderBy('id','asc')
		->select('goods.*','cates.name as names')
		->join('cates','cates.id','=','goods.cate_id')
		->where(function($query) use ($request){
		//获取关键字的内容
		$k=$request->input('keyword');
		if(!empty($k)){
			$query->where('name','like','%'.$k.'%');
		}
		})->paginate($request->input('num', 10));
		//分配变量  解析模板
		return view('admin.goods.index',['goods'=>$goods,'request'=>$request]);
	}

	/**
	 * 商品的修改页面
	 */
	public function getEdit(Request $request)
	{
		//读取当前的id的用户信息
		$id = $request->input('id');
		//读取数据库
		$goods = DB::table('goods')->where('id',$id)->first();
		//解析模板
		return view('admin.goods.edit');
	}

	


	/**
	 * 删除操作
	 */
	public function getDelete(Request $request)
	{
		$id = $request->input('id');
		//执行删除
        $res = DB::table('goods')->where('id', $id) -> delete();
        if($res) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
	}
}