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
        
        return view('dlist.index',['request'=>$request,'list'=>$list]);
    }
}
