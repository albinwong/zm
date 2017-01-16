@extends('home.user.center')
@section('title','订单列表')
@section('content')
<<<<<<< HEAD
=======
<style type="text/css">
	.dd{
		float:right;
		margin-left: 10px;
		
	}

</style>
<section id="content">
	<div class="content-wrap" style="padding:20px;">
		<div class="container clearfix">
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd

<div class="container-fluid">
	<div class="content-wrap" style="padding:20px">
			<!-- 左侧菜单 start -->
			<div class="col-md-2">
				<div class="list-group">
					<a href="/selfuser/info" class="list-group-item">
						查看个人信息
					</a>
					<a href="/selfuser/edit" class="list-group-item">
						修改个人信息
					</a>
					<a href="/order/list " class="list-group-item active">
						订单
					</a>
					<a href="/address/add" class="list-group-item">
						收货地址
					</a>
				</div>
			</div>
			<!-- 左侧菜单 end -->
			<!-- 右侧菜单 start -->
			<div class="col-md-10">
			@foreach($orders as $k=>$v)
			<div class="col-md-10 " style="margin:10px; ">	
				<div class="panel panel-info">
	                <div class="panel-heading" style="padding:20px 25px 48px;">
	                    <h3 class="panel-title pull-left" style="font-size:20px">订单号: {{$v->num}}</h3>
	               		<div class="pull-right col-xs-offset-1"style="font-size:20px">下单时间: {{date("Y-m-d H:i:s",$v->addtime)}} &nbsp;&nbsp;&nbsp;
	               		<div style="float:right "><input type="submit" id="btn-info" value="{{getStatusNameById($v->status)}}"></div> 
	               		<!-- <button class="btn btn-sm"></button> -->
	               		</div>
	                </div>
	                <div class="panel-body">
	                	@foreach($v->goods as $a=>$b)
	                    <div class="" >
	                    	<div class="col-md-2" style="width:200px;height:140px;"><img style="width:180px;height:120px;" src="{{getOnePicByGoodsId($b->id)}}" alt=""></div>
	                    	<div class="col-md-3">
	                    		<h5 style=" font-size:20px"><a href="/{{$b->goods_id}}.html" target="_blank">{{($b->name)}}</a></h5>
	                    	</div>

	                    	<div class="col-md-2" >
	                    		<h5 style=" font-size:20px">价格:￥{{$b->price}}</h5>
	                    	</div>
							
	                    	<div class="col-md-2" style=" font-size:20px">
	                    		<h5 style=" font-size:20px">数量: {{$b->num}}</h5>
	                    	</div>
	                    	<div class='col-md-2' style=" font-size:20px">
								<h5 style=" font-size:20px">总计 :￥{{$b->num * $b->price}}</h5>
							</div>
	                    </div>
	                    <div class="clearfix"></div>
	                    <hr>                                      
	                    @endforeach
		 				
	               </div>
	     
	           	</div>

	           	@if($v->status==0)
	          		<a href="/order/confirm?orderid={{$v->id}}" class=" pull-left btn btn-md btn-info " >去付款</a>
	          	@elseif($v->status==2)

<<<<<<< HEAD
	      			<a href="/review?orderid={{$v->id}}" class=" pull-left btn btn-md btn-info ">确认收货</a>
	          	@else
				@endif	
	            <button orderid="{{$v->id}}" class=" pull-right btn btn-md btn-info delete">取消订单</button>
			</div>

			<div class="clearfix"></div>
			@endforeach
			</div>
=======
                    	<div class="col-md-3">
                    		<h5>数量: {{$b->num}}</h5>
                    	</div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                    @endforeach
	 				
               </div>
     
           	</div>
          	<div id = "dd"><a href="/order/?id={{$v->id}}"><input class="dd" type="submit" value="去付款"></a></div>
          	<div id = "dd"><a href="/order/delete?id={{$v->id}}"><input class="dd" type="submit" value="取消订单"></a></div>
          	
          	
            @endforeach
		</div>
		
		
		</div>
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
	</div>
	
</div>
	<script>
		$('.delete').click(function(){

			var id=$(this).attr('orderid');
			var div=$(this);
			$.get('/order/delete',{'id':id},function(data){
				if(data){
					alert('取消成功');
					div.parent().remove();
				}else{
					alert('取消失败');
				}
			});
		});
	</script>
@endsection