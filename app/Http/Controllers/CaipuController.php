<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CaipuController extends Controller
{
    /**
     * 入口方法
     */
    public function index()
    {
        $url = 'http://www.chinacaipu.com/menu/chinacaipu/';
        $this->getDetail($url);
    }

    public function getDetail($url)
    {
        //获取源代码
        $code = file_get_contents($url);
        //菜品的名称
        preg_match_all('/<img alt="(.*)".*>/isU',$code,$tmp);
        //菜品的图片
        preg_match_all('/<img alt=".*".*src="(.*)".*>/isU',$code,$tmp1);
        //做法
        preg_match_all('/<font>(.*)<\/font>/isU',$code,$tmp2);
        
        //价格随机
        $price = rand(1,200);
        //销量
        $sold = rand(1,998);
        //库存
        $kucun = rand(50,9999);
        //分类
        $cate_id=rand(7,14);
        //插入数据库
        $goods_id = DB::table('goods')->insertGetId([
                'name'=>$tmp[1],
                'price'=>$price,
                'detail'=>$tmp2[1],
                'flavor'=>'正常@@偏重@@清淡@@免辣',
                'kucun'=>$kucun,
                'size'=>'小份@@中份@@大份',
                'cate_id'=>$cate_id,
        ]);

                

    }
}
