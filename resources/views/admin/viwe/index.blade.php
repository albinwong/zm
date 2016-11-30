@extends('layout.admin')
@section('title','轮播列表')
@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span class="icon-user">轮播列表</span>
  </div>

  <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
		<form action="/user/index" method="get">
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
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">描述</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">图片</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">简介</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($viwe as $k=>$v)
          <tr class="@if($k % 2 == 1) odd @else even @endif">
            <td class="  sorting_1">{{$v->id}}</td>
            <td class=" ">{{$v->intro}}</td>
            <td class=" "><img src="{{$v->img}}" width="200" alt=""></td>
            <td class=" ">{{$v->info}}</td>
			<td class=" ">
                <span class="btn-group">
                    <a href="/viwe/edit?id={{$v->id}}" class="btn btn-small"><i class="icon-pencil"></i></a>
                    <a href="/viwe/delete?id={{$v->id}}" class="btn btn-small"><i class="icon-trash"></i></a>
                </span>
            </td>
        @endforeach
        </tbody>
      </table>
      <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div id="pages">
        {!! $viwe->appends($request->all())->render() !!}
        </div>
    </div>
  </div>
</div>
@endsection