<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    /**
     * 将购物车信息存到session中
     *session_start();
     *$_SESSION['cart'][] = ['goods_id'=>100,'num'=>2];
     */
    public function add(Request $request)
    {
        //提取信息
        $data = $request->except(['_token']);
<<<<<<< HEAD
        //dd($data);
=======
         //dd($data);
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
        //检测商品是否在购物车中
        $status = $this->checkGoodsExists($data['goods_id']);
        if(!$status){
            // 将商品信息压入session中
            $request->session()->push('user.cart',$data);          
        }
        return view('home.cart.remind');
    }

    /**
     * 读取当前用户的session购物车信息
     */
    public function index(Request $request)
    { 
        $carts = $request->session()->get('user.cart');
<<<<<<< HEAD
        //dd($carts);
=======
        //var_dump($carts);
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
        $Total = 0;
         if(!empty($carts)){

            foreach($carts as $k => $v){
            //读取商品的基本信息   商品的单价  
            $carts[$k]['info'] = DB::table('goods')->where('id',$v['goods_id'])->first();
            //读取图片信息
            $carts[$k]['img'] = DB::table('pics')->where('goods_id',$v['goods_id'])->first();
            //小计
            $carts[$k]['total'] = $carts[$k]['num']*$carts[$k]['info']->price; 
            //dd($carts);

            //总价
            $Total +=$carts[$k]['total'];           
            }
          
        }
        //dd($Total);
        //分配变量 解析模板
        return view('home.cart.index',['carts' => $carts,'Total'=>$Total]); 
    }

    /**
    *检测是否存在
    */
    private function checkGoodsExists($goodsid)
    {
        //获取用户的购物车信息
        $carts = \Session::get('user.cart');
        // dd($carts);
        if(empty($carts)){return false;} 
        //检测商品id是否在session中
        foreach($carts as $k=>$v){
            if($v['goods_id']==$goodsid){
                return true;
            }
        }
        return false;
    }

    /**
    * 购物车删除
    */
    public function delete(Request $request)
    {
        $id = $_GET['id'];
        //获取购物车信息
         $carts = \Session::get('user.cart');
         // dd($carts);
         //dd($carts);
        foreach($carts as $k=>$v){
            if($v['goods_id']==$id){
                // $jian = $k;
                unset($carts[$k]);
            }
        }
<<<<<<< HEAD
        //dd($carts);
        session(['user.cart'=>$carts]);
=======
<<<<<<< HEAD
        //dd($carts);
        session(['user.cart'=>$carts]);
=======
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
        // session()->forget('user.cart');
        // unset($carts[$jian]);
        //dd($carts);
        // \Session::put('user.cart',$carts);
        session(['user.cart'=>$carts]);
        // dd(session('user.cart'));
<<<<<<< HEAD
=======
>>>>>>> dacfa8dd5aa50ff2cfb31b5437c15193c8ef0fb5
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd

         
    }



}
