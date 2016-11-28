<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    /**
     * 将购物车信息存入到session中
     * session_start();
     * $_SESSION['cart'][] = ['goods_id'=>100,'num'=>2];
     */
    public function add(Request $request)
    {
        // dd($request->all());    
        // 提取信息
        $data = $request->except(['_token']);
        //检测菜品是否存在购物车中
        $status = $this->checkGoodsExists($data['goods_id']);
        if(!$status){
            //将菜品信息压入到session中
            $request->session()->push('user.cart', $data);
        }
        return view('home.cart.remind');
    }

    /**
     * 读取当前用户的session的购物车信息
     */
    public function index(Request $request)
    {
        //读取用户的购物车信息
        $carts = $request->session()->get('user.cart');
        // dd($carts);

        //读取
        if(!empty($carts)){
            foreach($carts as $k => $v){
            //读取商品的基本信息
            $carts[$k]['info'] = DB::table('goods')->where('id',$v['goods_id'])->first();
            $carts[$k]['img'] = DB::table('pics')->where('goods_id',$v['goods_id'])->first();
            }
        }

        
        //分配变量 解析模板
        return view('home.cart.index',['carts' => $carts]); 
    }

    /**
    * 删除
     */
    public function delete()
    {
         $id = $_GET['id'];
        //获取购物车信息
         $carts = \Session::get('user.cart');
        foreach($carts as $k=>$v){
            if($v['id']==$id){
                $jian = $k;
            }
        }
        session()->forget('user.cart');
        unset($carts[$jian]);
        \Session::put('user.cart',$carts);
         
    }


    /**
     * 检测是否存在
     * 如果存在返回true   如果不存在返回false
     */
    private function checkGoodsExists($goodsid)
    {
        //获取用户的购物车信息
        $carts = \Session::get('user.cart');
        if(empty($carts)) return false;
        //检测商品的id是否存在session中
        foreach($carts as $k=>$v){
            if($v['goods_id'] == $goodsid){
                return true;
            }
        }
        return false;
    }
}
