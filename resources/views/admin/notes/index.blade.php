@extends('layout.admin')
@section('content')
@section('title','用户列表')
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
    <span class="icon-user">留言列表</span>
  </div>

  <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
		<form action="/notes/index" method="get">
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

      <table class="mws-datatable-fn mws-table dataTable text-center" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
          <tr role="row">
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">留言ID</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">类型</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 150px;" aria-label="Browser: activate to sort column ascending">留言者</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">邮箱</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 150px;" aria-label="Platform(s): activate to sort column ascending">联系电话</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">标题</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Platform(s): activate to sort column ascending">留言日期</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 165px;" aria-label="Platform(s): activate to sort column ascending">IP地址</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 115px;" aria-label="Platform(s): activate to sort column ascending">是否回复</th>
            <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 90px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($res as $k=>$v)
          <tr class="@if($k % 2 == 1) odd @else even @endif">
            <td class="sorting_1">{{$v->id}}</td>
            <td class=" ">{{getNotesType($v->type)}}</td>
            <td class=" ">{{$v->author}}</td>
            <td class=" ">{{$v->email}}</td>
            <td class=" ">{{$v->tel}}</td>
			<td class=" ">{{$v->title}}</td>
			<td class=" ">{{date('Y年m月d日 h:i:s',$v->date)}}</td>
			<td class=" ">{{$v->ip}}</td>
			<td class=" ">@if(empty($v->reply)) 未回复 @else 已回复 @endif</td>
			<td class=" ">
                <span class="btn-group">
                    <a href="/msg/edit?id={{$v->id}}" class="btn btn-small"><i class="icon-pencil"></i></a>
                    <a href="/msg/delete?id={{$v->id}}" class="btn btn-small"><i class="icon-trash"></i></a>
                </span>
            </td>
        @endforeach
        </tbody>
      </table>
      <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div id="pages">
        {!! $res->appends($request->all())->render() !!}
        </div>
    </div>
  </div>
</div>
@endsection