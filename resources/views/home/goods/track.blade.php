@extends('layout.home')
@section('title','足迹')
@section('content')
<<<<<<< HEAD

<div class="container clearfix">
@foreach($track as $k=>$v)
<div class="col-md-2 aa col-md-offset-1">
<div class="clearfix"></div>
	<div class="content_box" style="margin-bottom:20px;width:200px;">	
		<div class="view view-fifth">
			<a href="/{{$v->id}}.html">
				<img src="{{$v->path}}" style="width:200px;height:145px;" class="img-responsive" alt=""> 
=======
<style type="text/css">
	.group{
		height:600px;
<<<<<<< HEAD
	}
</style>
<div class="container-fluid group">
=======
<<<<<<< HEAD
		margin-top:20px;
	}
</style>
<div class="container group">
@foreach($track as $k=>$v)
=======
	}
</style>
<div class="container-fluid group">
>>>>>>> dacfa8dd5aa50ff2cfb31b5437c15193c8ef0fb5
>>>>>>> f1e404c080887460c34580b77ab0f5d492bd60ec
<div class="col-md-3">
	<div class="content_box" style="margin-bottom:20px;">	
		<div class="view view-fifth">
			<a href="/{{$v->id}}.html">
<<<<<<< HEAD
				<img src="{{getPics($v->id)}}" class="img-responsive" alt=""> 
=======
<<<<<<< HEAD
				<img src="/homes/images/p1.jpg" class="img-responsive" alt=""> 
=======
				<img src="{{getPics($v->id)}}" class="img-responsive" alt=""> 
>>>>>>> dacfa8dd5aa50ff2cfb31b5437c15193c8ef0fb5
>>>>>>> f1e404c080887460c34580b77ab0f5d492bd60ec
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
			</a>	
		<div class="content_box-grid">
		<a href="/{{$v->id}}.html"><p class="m_1">{{$v->name}}</p></a>
		<div class="price">价格￥:
		<span class="actual">{{$v->price}}</span>
		</div>
		<ul class="product_but">
		<a href="#"><li class="but3">加入购物车</li></a>
<<<<<<< HEAD
		<li> <span class="glyphicon glyphicon-hand-right col-xs-2" style="color:red">:{{$v->views}}</span><span> </span></li>
		<div class="clearfix"> </div>
		</ul>
		<div class="mask">
=======
		<li> <span class="glyphicon glyphicon-hand-right col-xs-2" style="color:red">:333</span><span> </span></li>
		<div class="clearfix"> </div>
		</ul>
		<div class="mask">
		<div class="info">Quick View</div>
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
		</div>
		</div>
		</div>
	</div>
</div>
<<<<<<< HEAD
<!-- <div class="clearfix"></div> -->
=======
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
@endforeach
</div>
@endsection