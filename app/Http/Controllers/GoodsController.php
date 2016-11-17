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
	 * ��Ʒ�����
	 */
	public function getAdd()
	{
		//��ȡ������Ϣ
		$res = CateController::getCateInfo();
		
		//����ģ��  �������
		return view('admin.goods.add',['cates'=>$res]);
	}

	/**
	 * ��Ʒ�Ĳ���
	 */
	public function postInsert(Request $request)
	{
		//��ȡ����
		$data = $request->except(['_token','path']);
		
		//�����ݲ��뵽������
		$gid = DB::table('goods')->insertGetId($data);
		// ����ͼƬ
		if($request -> hasFile('path')){
			//��ƴ�ӵ�����
			$d = [];
			//��ȡ���е��ļ�����
			$files = $request->file('path');
			foreach ($files as $k => $v) {
				$fileName = time().rand(100000,9999999);
				$suffix = $v->getClientOriginalExtension();
				//ƴ���ļ���
				$fileName = $fileName.".".$suffix;
				//Ŀ¼
				$dir = './Uploads/'.date('Ymd').'/';
				$v->move($dir,$fileName);
				//ƴ��ͼƬ·�� (����·��)
				$tmp['path'] = trim($dir.$fileName,'.');
				$tmp['goods_id'] = $gid;
				$d[] = $tmp;

			}
			//��ͼƬ��Ϣ���뵽���ӱ���
			$res = DB::table('pics')->insert($d);
			if($res && $gid){
				return redirect('/goods/index')->with('info','��ӳɹ�');
			}else{
				return back()->with('info','���ʧ��!!!!');
			}
		}
		if($gid){
			//��ת
			return redirect('/goods/index')->with('info','��ӳɹ�');	
		}else{
			//����
			return back()->with('info','���ʧ��!!!!');
		}	
	}

	/**
	 * �б���ʾ
	 */
	public function getIndex(Request $request)
	{
		//��ȡ����
		$goods = DB::table('goods')->orderBy('id','asc')
		->select('goods.*','cates.name as names')
		->join('cates','cates.id','=','goods.cate_id')
		->where(function($query) use ($request){
		//��ȡ�ؼ��ֵ�����
		$k=$request->input('keyword');
		if(!empty($k)){
			$query->where('name','like','%'.$k.'%');
		}
		})->paginate($request->input('num', 10));
		//�������  ����ģ��
		return view('admin.goods.index',['goods'=>$goods,'request'=>$request]);
	}

	/**
	 * ��Ʒ���޸�ҳ��
	 */
	public function getEdit(Request $request)
	{
		//��ȡ��ǰ��id���û���Ϣ
		$id = $request->input('id');
		//��ȡ���ݿ�
		$goods = DB::table('goods')->where('id',$id)->first();
		//����ģ��
		return view('admin.goods.edit');
	}

	


	/**
	 * ɾ������
	 */
	public function getDelete(Request $request)
	{
		$id = $request->input('id');
		//ִ��ɾ��
        $res = DB::table('goods')->where('id', $id) -> delete();
        if($res) {
            return back()->with('info','ɾ���ɹ�');
        }else{
            return back()->with('info','ɾ��ʧ��');
        }
	}
}
=======

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
        dd($request->all());
        $res = $request->except(['_token','path']);
        // $res['color'] = implode('@',$res['color']);
        $res['size'] = implode('@',$res['size']);
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

    // public function index()
    // {
    //     dd(222);
    // }

   

}   

>>>>>>> 58fd43743d922b94362687f5dac9e6cb8ad516ac
