<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class DlistController extends Controller
{
    public function getIndex(Request $request)
    {   
        $list = DB::table('order')->orderBy('user_id')
            ->join('users','users.id','=','order.user_id')
            ->get();
        
        return view('dlist.index',['request'=>$request,'list'=>$list]);
    }
}
