<?php
<<<<<<< HEAD
=======

>>>>>>> 58fd43743d922b94362687f5dac9e6cb8ad516ac
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

<<<<<<< HEAD
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
=======

class GoodsController extends Controller
{
    //鍟嗗搧鐨勬坊鍔�
    public function add()
    {
        //璇诲彇鍒嗙被淇℃伅
        // $res = CateController::getCateInfo();
         $res = DB::table('cates')->select(db::raw('*, concat(path,",",id) as paths'))->orderBy('paths')->get();
            foreach($res as $k=>$v){
                $total = count(explode(',',$v->path))-1;
            if($total>0){
                $v->name = str_repeat('&nbsp;', 10*$total). '|-----'.$v->name;
            }
        }
        //瑙ｆ瀽妯＄増   鍒嗛厤鍙橀噺
        return view('admin.goods.add',['cates'=>$res]);
    }

    //鎵ц娣诲姞
    public function insert(Request $request)
    {
        dd($request->all());
        $res = $request->except(['_token','path']);
        // $res['color'] = implode('@',$res['color']);
        $res['size'] = implode('@',$res['size']);
        $gid = DB::table('goods')->insertGetId($res);
        if($request->hasFile('path')){
            //寰呮嫾鎺ョ殑鏁版嵁
            $d = [];
            // 鑾峰彇鎵�鏈夌殑鏂囦欢瀵硅薄
            $files = $request->file('path');
            foreach($files as $k=>$v){
                //鎷兼帴鏂囦欢鍚�
                $fileName = time().rand(100000,999999);
                //鑾峰彇涓婁紶鏂囦欢鐨勫悗缂�鍚�  .jpg
                $suffix = $v->getClientOriginalExtension();
                //鎷兼帴鏂囦欢鍚�
                $fileName = $fileName.'.'.$suffix;
                //鐩綍
                $dir = './Uploads/'.date('Ymd').'/';
                $v->move($dir,$fileName);
                //鎷兼帴ok鐨勫浘鐗囪矾寰�(缁濆璺緞)
                $tmp['path'] = trim($dir.$fileName,'.');
                $tmp['goods_id'] = $gid;
                $d[] = $tmp;

                $filed = DB::table('pics')->insert($d);

            }
        }

    }

    // public function index()
    // {
    //     dd(222);
    // }

   

}   

>>>>>>> 58fd43743d922b94362687f5dac9e6cb8ad516ac
