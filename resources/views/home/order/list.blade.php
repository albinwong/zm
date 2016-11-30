@extends('home.user.center')
@section('title','订单列表')
@section('content')
<style type="text/css">
	.dd{
		float:right;
		margin-top: 5px;
		
		
	}
</style>
<section id="content">
	<div class="content-wrap" style="padding:20px;">
		<div class="container clearfix">

		<!-- 左侧菜单 start -->
			<div class="col-md-3">
				<div class="list-group">
					<a href="/selfuser/info" class="list-group-item">
						查看个人信息
					</a>
					<a href="/selfuser/edit" class="list-group-item">
						修改个人信息
					</a>
					<a href="/order/index" class="list-group-item active">
						订单
					</a>
					<a href="/address/add" class="list-group-item">
						收货地址
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
               		<div class="pull-right">下单时间: {{date("Y-m-d H:i:s",$v->addtime)}} &nbsp;&nbsp;&nbsp;
               		<div style="float:right"><input type="submit" id="btn-info" value="{{getStatusNameById($v->status)}}"></div> 
               		<!-- <button class="btn btn-sm"></button> -->
               		</div>
                </div>
                <div class="panel-body">
                	@foreach($v->goods as $a=>$b)
                    <div class="item">
                    	<div class="col-md-2"><img src="{{getOnePicByGoodsId($b->id)}}" alt=""></div>
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
               
               <!-- <button type="button" class="btn btn-default btn-lg">
  					<span class="glyphicon glyphicon-star"></span>取消订单
				</button -->
           </div>

            	<div><a href="/order/delete?id={{$v->id}}"><input class="dd" type="submit" value="取消订单"></a></div><br><br><br>
            @endforeach
		</div>
		
		
		</div>
	</div>
</section>
@endsection