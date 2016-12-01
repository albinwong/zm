@extends('layout.home')
@section('content')
<style type="text/css">
	.matter{
		height: 300px;
	}
	a:hover{
		text-decoration: none;
	}
</style>
<div class="matter">
<div class="container clearfix">
	<div class="col-md-12" style="height:80px;background:#f3f3f3;border:1px solid #e9e9e9;">
		<div class="col-md-3 col-md-offset-1" style="padding-top:15px;"><a href="#">购物车</a> / 提醒</div>
	</div>
</div>	
<div class="container clearfix">
	<div class="alert alert-success col-md-5 col-md-offset-4" role="alert" style="margin-top:50px;margin-bottom:50px;">
      	<strong>恭喜您!!</strong> 成功加入购物车!您可以直接进入<a href="/cart">购物车</a>&nbsp;&nbsp;&nbsp;<a href="/glist">继续购物</a>
	</div>
</div>
</div>
@endsection