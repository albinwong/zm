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

</script>
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
                <th >订单号:</th>
                <th >用户ID:</th>
                <th >收货人:</th>
                <th >联系电话:</th>
                <th >收货地址:</th>
                <th >订单时间:</th>
                <th >物流状态:</th>
                <th>操作:</th>

            </tr>
        </thead>
       @foreach($list as $k=>$v)
        <tbody role="alert"  >
            <tr class="@if($k % 2 == 1) odd @else even @endif" >
                <td class=" ">{{$v->id}}</td>
                <td class=" ">{{$v->user_id}}</td>
                <td class=" ">{{$v->username}}</td> 
                <td class=" ">{{$v->phone}}</td>
                <td class=" ">{{$v->address}}</td>
                <td class=" ">{{$v->addtime}}</td>
                <td class=" ">{{getStatusNameById($v->status)}}</td>
                <td class=" ">
                    <span class="btn-group">
                        <a href="/dlist/edit?status=2&num={{$v->num}}" class="btn btn-small"><i class="icon-pencil"></i>已发货</a>
                        <!-- <a href="/dlist/edit?status=3&num={{$v->num}}" class="btn btn-small"><i class="icon-pencil"></i>已到货</a> -->
                        <a href="/dlist/delete?num={{$v->num}}" class="btn btn-small"><i class="icon-trash"></i></a>
                    </span>
                </td>
            </tr>
        </tbody>
        @endforeach
       </table>

    </div>
  </div>

<div id="pages">
</div>
</div>
</div>
@endsection