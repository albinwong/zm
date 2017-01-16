<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class DlistController extends Controller
{
	/**
	 * 订单列表
	 */

    public function getIndex(Request $request)
    {   
        $list = DB::table('orders')->orderBy('user_id')
            ->join('users','users.id','=','orders.user_id')
            ->get();
        
        return view('admin.dlist.index',['request'=>$request,'list'=>$list]);
    }

    /**
     * 修改物流状态
     */
    public function getEdit(Request $request)
    {
        $send = $request->all();
        //更新数据
        $res = DB::table('orders')->where('num',$send['num'])->update($send);
        //判断
        if($res){
            return redirect('/dlist/index')->with('info','发货成功');
        }else{
            return redirect('/dlist/index')->with('info','发货失败');
        }
    }

    /**
     * 删除订单
     */
    public function getDelete(Request $request)
    {
        //接收参数
        $num = $request->all();
        //执行删除
        $del = DB::table('orders')->where('num',$num)->delete();
        //判断
        if($del){
            return redirect('/dlist/index')->with('info','删除成功');
        }

    }

}
