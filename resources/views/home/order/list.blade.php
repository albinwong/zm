@extends('home.user.center')
@section('title','订单列表')
@section('content')
<section id="content">
	<div class="content-wrap" style="padding:20px;">
		<div class="container clearfix">

		<!-- 左侧菜单 start -->
			<div class="col-md-3">
				<div class="list-group">
					<a href="#" class="list-group-item">
						修改个人信息
					</a>
					<a href="/order/index" class="list-group-item active">
						订单
					</a>
					<a href="#" class="list-group-item">
						收货地址
					</a>
					<a href="#" class="list-group-item">
						收藏
					</a>
					<a href="#" class="list-group-item">
						浏览历史
					</a>
					
				</div>
			</div>
		<!-- 左侧菜单 end -->
		<!-- 右侧菜单 start -->
		<div class="col-md-9 ">
			@foreach($orders as $k=>$v)
			<div class="panel panel-info">
                <div class="panel-heading" style="padding:10px 0px 30px;">
                    <h3 class="panel-title pull-left" style="font-size:14px">订单号: {{$v->num}}</h3>
               		<div class="pull-right">下单时间: {{date("Y-m-d H:i:s",$v->addtime)}} &nbsp;&nbsp;&nbsp; <button class="btn btn-sm btn-info">{{getStatusNameById($v->status)}}</button></div>
                </div>
                <div class="panel-body">
                	@foreach($v->goods as $a=>$b)
                    <div class="item">
                    	<div class="col-md-1"><img src="{{getOnePicByGoodsId($b->id)}}" alt=""></div>
                    	<div class="col-md-5">
                    		<h5><a href="/{{$b->id}}.html" target="_blank">{{($b->name)}}</a></h5>
                    	</div>

                    	<div class="col-md-2">
                    		<h5>价格:￥{{$b->price}}</h5>
                    	</div>

                    	<div class="col-md-3">
                    		<h5>数量: {{$b->num}}</h5>
                    	</div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    @endforeach

                </div>
            </div>
            @endforeach
		</div>
		

		</div>
	</div>
</section>
@endsection