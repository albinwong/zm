@extends('layout.admin')

@section('title','菜品列表')

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
        <form action="/goods/index" method="get">
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
                <input aria-controls="DataTables_Table_1" name="keyword" value="{{$request->input('keyword')}}" type="text">&nbsp;<button class="btn btn-info"><i class="icon-search"></i></button></label></div>
        </form>

      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">商品名称</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">价格</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">分类名称</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">状态</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($goods as $k=>$v)
          <tr class="@if($k % 2 == 1) odd @else even @endif">
            <td class="  sorting_1">{{$v->id}}</td>
            <td class=" ">{{$v->name}}</td> 
            <td class=" ">{{$v->price}}</td>
            <td class=" ">{{$v->names}}</td>
            <td class=" ">
            
               @if($v->status == 0) <span class="badge badge-warning">已下架</span> @else <span class="badge badge-success">已上架</span> @endif
                </td>
            <td class=" ">
             <span class="btn-group">
                <a href="/goods/sta?id={{$v->id}}&status={{$v->status}}" class="btn btn-small"><i >上、下架</i></a>
                <a href="/goods/edit?id={{$v->id}}" class="btn btn-small"><i class="icon-pencil"></i></a>
                <a href="/goods/delete?id={{$v->id}}" class="btn btn-small"><i class="icon-trash"></i></a>
            </span></td></tr>
        @endforeach
        </tbody>
       
    </div>
  </div>

</table>
<div id="pages">
    {!! $goods->appends($request->all())->render() !!}
</div>
</div>
</div>
@endsection