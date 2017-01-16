@extends('layout.home')
@section('title','足迹')
@section('content')

<div class="container clearfix">
@foreach($track as $k=>$v)
<div class="col-md-2 aa col-md-offset-1">
<div class="clearfix"></div>
	<div class="content_box" style="margin-bottom:20px;width:200px;">	
		<div class="view view-fifth">
			<a href="/{{$v->id}}.html">
				<img src="{{$v->path}}" style="width:200px;height:145px;" class="img-responsive" alt=""> 
			</a>	
		<div class="content_box-grid">
		<a href="/{{$v->id}}.html"><p class="m_1">{{$v->name}}</p></a>
		<div class="price">价格￥:
		<span class="actual">{{$v->price}}</span>
		</div>
		<ul class="product_but">
		<a href="#"><li class="but3">加入购物车</li></a>
		<li> <span class="glyphicon glyphicon-hand-right col-xs-2" style="color:red">:{{$v->views}}</span><span> </span></li>
		<div class="clearfix"> </div>
		</ul>
		<div class="mask">
		</div>
		</div>
		</div>
	</div>
</div>
<!-- <div class="clearfix"></div> -->
@endforeach
</div>
@endsection