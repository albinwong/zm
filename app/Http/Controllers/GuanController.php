<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GuanController extends Controller
{
    //用户关注的商品管理
   public function guan(Request $request)
   {
        //获取传参
        $goods_id = $request->input('goods_id');
        $data = [];
        $data['uid']=session('uid');
        $data['goods_id']=$goods_id;
        //查询shou表中是否已经有uid   goods_id  
        //查询用是否有关注商品
        //1  如果用户初次看见商品 关注表中无用户id 无商品id 状态为空
        //2  如果用户已关注商品  表中已有用户id  有商品id  状态为1(已关注)
        //3  如果用户取消关注  表中已有用户id  有商品id  状态为0(为关注)删除
        $stat = DB::table('shou')->where('uid',$data['uid'])->first();
        $stat1 = DB::table('shou')->where('goods_id',$goods_id)->first();
        if(!empty($stat) && !empty($stat1)){
            $res = $stat->status;
            if($res==1){
                //如果已关注 取消关注
                DB::table('shou')->where($data)->delete();
                echo 0;
            }else{
                //如果未关注 加关注
                DB::table('shou')->where('sid',$res)->update(['status'=>1]);
                echo 1;
            }
        }else{
            //初次 加关注
            $res2 = DB::table('shou')->insertGetId($data);
            DB::table('shou')->where('sid',$res2)->update(['status'=>1]);
            echo 1;
        }
        
   }

   /**
    * 关注列表
    */
   public function shouc(Request $request)
   {
        // dd(222);
        $shouc = DB::table('users')
            ->join('shou', 'users.id', '=', 'shou.uid')
            ->join('goods', 'goods.id', '=', 'shou.goods_id')
            ->select('shou.*', 'goods.*', 'users.*')
            ->get();

        return view('admin.shou.shouc',['shouc'=>$shouc,'request'=>$request]);
    }

}