@extends('layout.home')
@section('title','留言板')
@section('content')
<div class="col-md-8 col-md-offset-2">
<form action="/chaxun" post="get">
	<div class="product-filter">
	 <div class="sort"><b>留言类型:</b>
	     <select name="type">
			<option value="#">咨询</option>
			<option value="#">建议</option>
			<option value="#">投诉</option>
			<option value="#">意见</option>
		  </select>
	 </div>
	 <div class="limit"><b>关键字:</b>
		<input type="text" name="content" placeholder="请输入关键字">
	</div>
	<a class="btn btn-ifo">搜索</a>
</form>
<div class="pull-right btn-info"><a href="/notes/add">我要留言</a></div>
</div>
<div class="clearfix"> </div>
@foreach($res as $k=>$v)
<div class="panel @if(empty($v->reply)) panel-default @else panel-primary @endif"><div class="clearfix"></div>
  <!-- Default panel contents -->
  <div class="panel-heading col-md-12 text-left">
	<div class="col-md-3">留言编号:{{$v->mid}}</div>
	<div class="col-md-2">留言者:{{$v->author}}</div>
	<div class="col-sm-3">来自:{{$v->ip}}</div>
	<div class="col-md-4">留言时间:{{date('Y-m-d H:i:s',$v->date)}}</div>
  </div>

  <!-- Table -->
  <table class="table table-bordered">
    <tr><th class="col-md-2">留言标题:</th><td>{{$v->title}}</td></tr>	
	 <tr><th>内容:</th><td class="col-md-10">{{$v->content}}</td></tr>
  </table>
  <div class="divider text-left"></div>
 
  <pre style="color:red;display:@if(empty($v->reply)) none @else block @endif">
  	<strong class="pull-left" style="font-size:12px">管理回复:</strong><p><br>&emsp;&emsp;{!!$v->reply!!}</p>
  </pre>
</div>
@endforeach
<div id="pages" class="pull-right">
	{!! $res->appends($request->all())->render() !!}
</div>
</div><div class="clearfix"></div>
@endsection