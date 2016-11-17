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
	 * ÉÌÆ·µÄÌí¼Ó
	 */
	public function getAdd()
	{
		//¶ÁÈ¡·ÖÀàÐÅÏ¢
		$res = CateController::getCateInfo();
		
		//½âÎöÄ£°å  ·ÖÅä±äÁ¿
		return view('admin.goods.add',['cates'=>$res]);
	}

	/**
	 * ÉÌÆ·µÄ²åÈë
	 */
	public function postInsert(Request $request)
	{
		//ÌáÈ¡Êý¾Ý
		$data = $request->except(['_token','path']);
		
		//½«Êý¾Ý²åÈëµ½Ö÷±íÖÐ
		$gid = DB::table('goods')->insertGetId($data);
		// ´¦ÀíÍ¼Æ¬
		if($request -> hasFile('path')){
			//´ýÆ´½ÓµÄÊý¾Ý
			$d = [];
			//»ñÈ¡ËùÓÐµÄÎÄ¼þ¶ÔÏó
			$files = $request->file('path');
			foreach ($files as $k => $v) {
				$fileName = time().rand(100000,9999999);
				$suffix = $v->getClientOriginalExtension();
				//Æ´½ÓÎÄ¼þÃû
				$fileName = $fileName.".".$suffix;
				//Ä¿Â¼
				$dir = './Uploads/'.date('Ymd').'/';
				$v->move($dir,$fileName);
				//Æ´½ÓÍ¼Æ¬Â·¾¶ (¾ø¶ÔÂ·¾¶)
				$tmp['path'] = trim($dir.$fileName,'.');
				$tmp['goods_id'] = $gid;
				$d[] = $tmp;

			}
			//½«Í¼Æ¬ÐÅÏ¢²åÈëµ½¸½¼Ó±íÖÐ
			$res = DB::table('pics')->insert($d);
			if($res && $gid){
				return redirect('/goods/index')->with('info','Ìí¼Ó³É¹¦');
			}else{
				return back()->with('info','Ìí¼ÓÊ§°Ü!!!!');
			}
		}
		if($gid){
			//Ìø×ª
			return redirect('/goods/index')->with('info','Ìí¼Ó³É¹¦');	
		}else{
			//»ØÌø
			return back()->with('info','Ìí¼ÓÊ§°Ü!!!!');
		}	
	}

	/**
	 * ÁÐ±íÏÔÊ¾
	 */
	public function getIndex(Request $request)
	{
		//¶ÁÈ¡Êý¾Ý
		$goods = DB::table('goods')->orderBy('id','asc')
		->select('goods.*','cates.name as names')
		->join('cates','cates.id','=','goods.cate_id')
		->where(function($query) use ($request){
		//»ñÈ¡¹Ø¼ü×ÖµÄÄÚÈÝ
		$k=$request->input('keyword');
		if(!empty($k)){
			$query->where('name','like','%'.$k.'%');
		}
		})->paginate($request->input('num', 10));
		//·ÖÅä±äÁ¿  ½âÎöÄ£°å
		return view('admin.goods.index',['goods'=>$goods,'request'=>$request]);
	}

	/**
	 * ÉÌÆ·µÄÐÞ¸ÄÒ³Ãæ
	 */
	public function getEdit(Request $request)
	{
		//¶ÁÈ¡µ±Ç°µÄidµÄÓÃ»§ÐÅÏ¢
		$id = $request->input('id');
		//¶ÁÈ¡Êý¾Ý¿â
		$goods = DB::table('goods')->where('id',$id)->first();
		//½âÎöÄ£°å
		return view('admin.goods.edit');
	}

	


	/**
	 * É¾³ý²Ù×÷
	 */
	public function getDelete(Request $request)
	{
		$id = $request->input('id');
		//Ö´ÐÐÉ¾³ý
        $res = DB::table('goods')->where('id', $id) -> delete();
        if($res) {
            return back()->with('info','É¾³ý³É¹¦');
        }else{
            return back()->with('info','É¾³ýÊ§°Ü');
        }
	}
}
=======

class GoodsController extends Controller
{
    //å•†å“çš„æ·»åŠ 
    public function add()
    {
        //è¯»å–åˆ†ç±»ä¿¡æ¯
        // $res = CateController::getCateInfo();
         $res = DB::table('cates')->select(db::raw('*, concat(path,",",id) as paths'))->orderBy('paths')->get();
            foreach($res as $k=>$v){
                $total = count(explode(',',$v->path))-1;
            if($total>0){
                $v->name = str_repeat('&nbsp;', 10*$total). '|-----'.$v->name;
            }
        }
        //è§£æžæ¨¡ç‰ˆ   åˆ†é…å˜é‡
        return view('admin.goods.add',['cates'=>$res]);
    }

    //æ‰§è¡Œæ·»åŠ 
    public function insert(Request $request)
    {
        dd($request->all());
        $res = $request->except(['_token','path']);
        // $res['color'] = implode('@',$res['color']);
        $res['size'] = implode('@',$res['size']);
        $gid = DB::table('goods')->insertGetId($res);
        if($request->hasFile('path')){
            //å¾…æ‹¼æŽ¥çš„æ•°æ®
            $d = [];
            // èŽ·å–æ‰€æœ‰çš„æ–‡ä»¶å¯¹è±¡
            $files = $request->file('path');
            foreach($files as $k=>$v){
                //æ‹¼æŽ¥æ–‡ä»¶å
                $fileName = time().rand(100000,999999);
                //èŽ·å–ä¸Šä¼ æ–‡ä»¶çš„åŽç¼€å  .jpg
                $suffix = $v->getClientOriginalExtension();
                //æ‹¼æŽ¥æ–‡ä»¶å
                $fileName = $fileName.'.'.$suffix;
                //ç›®å½•
                $dir = './Uploads/'.date('Ymd').'/';
                $v->move($dir,$fileName);
                //æ‹¼æŽ¥okçš„å›¾ç‰‡è·¯å¾„(ç»å¯¹è·¯å¾„)
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
