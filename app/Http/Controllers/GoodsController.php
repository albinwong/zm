<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

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