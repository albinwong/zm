@extends('layout.home')

@section('content')
<script type="/homes/js/detail.js"></script>
<style type="text/css">
	.addr{
		height:120px;
		border: solid 1px #ddd;
		margin: 20px;
		cursor: pointer;
	}
	.addr p{
		margin:0px;
	}
	.button{
		float:right;
	}
	#addresses .active{
		border:dashed 2px green;
	}
</style>
<section id="content">
	<div class="content-wrap" style="padding:20px 0">
		<div class="container clearfix">
			<h3>选择收货地址 <a href="/address/add" style="font-size:14px">添加新地址</a></h3>
			<div id="addresses">
				@foreach($address as $k=>$v)

				<div class="addr  col-md-3" aid="{{$v->id}}">
					<p>收货人: {{$v->name}}</p> 
					<p>联系电话: {{$v->number}}</p>
					<p>配送地址:{{getAreaName($v->sheng)}} {{getAreaName($v->shi)}} {{getAreaName($v->xian)}} {{$v->detail}}</p>
				</div>
				@endforeach
			
			</div>
			<form action="/order/confirm" method="post">
				<div class="clearfix"></div>
				<h3>选择支付方式</h3>
				<div id="pays">
					<label>支付宝:<input type="radio" name="pay_type" value="alipay"></label>
					<label>微信扫码:<input type="radio" name="pay_type" value="wei_sao"></label>
					<label>小high付:<input type="radio" name="pay_type" value="high_pay"></label>
				</div>
				<input type="hidden" name="address_id" value="">
				<input type="hidden" name="order_id" value="{{$request->input('orderid')}}">
				{{csrf_field()}}
				<div><button  class="button button-3d nomargin fright">确认订单并支付</button></div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
	$(function(){
		// 获取元素
		$('.addr').click(function(){
			// 样式切换
			$(this).siblings().removeClass('active');
			$(this).addClass('active');
			// 值要修改
			var aid = $(this).attr('aid');
			// 修改隐藏域的值
			$('input[name=address_id]').val(aid);
		})
	})
	</script> 
</section>
@endsection