@extends('layout.admin')

@section('title','订单列表')

@section('content')
<style type="text/css"> 
    #pages li{
        background-color: #444444;
        border-left: 1px solid rgba(255, 255, 255, 0.15);
        border-right: 1px solid rgba(0, 0, 0, 0.5);
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;
        color: #fff;
        cursor: pointer;
        display: block;
        float: left;
        font-size: 12px;
        height: 20px;
        line-height: 20px;
        outline: medium none;
        padding: 0 10px;
        text-align: center;
        text-decoration: none;
    }
    #pages .disabled{
        color: #666666;
        cursor: default;
    }

    #pages .active{
        background:#808080;
        color:#323232;
    }

    #pages{
        height:auto;
        overflow:hidden;
        padding:0px;
        margin:0px;
    }

    #pages ul{
        padding:0px;
        margin:0px;
    }
</style>

<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>商品列表</span>
  </div>

  <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        <form action="/dlist/index" method="get">
            <div id="DataTables_Table_1_length" class="dataTables_length">
              <label>显示
                <select size="1" name="num" aria-controls="DataTables_Table_1">
                  <option value="10" @if($request->input('num') == 10) selected @endif>10</option>
                  <option value="25" @if($request->input('num') == 25) selected @endif>25</option>
                  <option value="50" @if($request->input('num') == 50) selected @endif>50</option>
                  <option value="100" @if($request->input('num') == 100) selected @endif>100</option></select>条</label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
              <label>关键字:
                <input aria-controls="DataTables_Table_1" name="keyword" value="" type="text">&nbsp;<button class="btn btn-info"><i class="icon-search"></i></button></label></div>
        </form>

      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info" style="font-size:16px;text-align:center;">
        <thead>
            <tr>
                <th >用户ID:</th>
<<<<<<< HEAD:resources/views/admin/shou/shouc.blade.php
                <th >用户名:</th>
                <th >商品ID:</th>
                <th >商品名称:</th>
                <th >商品价格:</th>
                <th >关注状态:</th>
=======
                <th >收货人:</th>
                <th >联系电话:</th>
                <th >收货地址:</th>
                <th >订单时间:</th>
                
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd:resources/views/dlist/index.blade.php
            </tr>
        </thead>
        <tbody role="alert"  >
       @foreach($shouc as $k=>$v)
            <tr class="@if($k % 2 == 1) odd @else even @endif" >
<<<<<<< HEAD:resources/views/admin/shou/shouc.blade.php
                <td class=" ">{{$v->uid}}</td>
                <td class=" ">{{$v->username}}</td>
                <td class=" ">{{$v->goods_id}}</td> 
                <td class=" ">{{$v->name}}</td> 
                <td class=" ">{{$v->price}}</td>
                <td class=" ">@if($v->status==1) 已关注 @else 关注 @endif </td>
=======
                <td class=" ">{{$v->id}}</td>
                <td class=" ">{{$v->user_id}}</td>
                <td class=" ">{{$v->username}}</td> 
                <td class=" ">{{$v->phone}}</td>
                <td class=" ">{{$v->address}}</td>
                <td class=" ">{{$v->regtime}}</td>
               
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd:resources/views/dlist/index.blade.php
            </tr>
        @endforeach
        </tbody>
       </table>
		
    </div>
  </div>
  </div>  
<div class="clearfix"></div>


@endsection

