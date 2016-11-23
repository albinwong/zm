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
</style>
<section id="content">
	<div class="content-wrap" style="padding:20px 0">
		<div class="container clearfix">
			<h3>选择收货地址 <a href="/address/add" style="font-size:14px">添加新地址</a></h3>
			<div id="addresses">
				<div class="addr col-md-3">
					<p>收货人:某某</p>
					<p>联系电话:xxxxxxxx</p>
					<p>配送地址:北京市 几环 哪个区</p>
				</div>
				<div class="addr col-md-3">
					<p>收货人:某某</p>
					<p>联系电话:xxxxxxxx</p>
					<p>配送地址:北京市 几环 哪个区</p>
				</div>
				<div class="addr col-md-3">
					<p>收货人:某某</p>
					<p>联系电话:xxxxxxxx</p>
					<p>配送地址:北京市 几环 哪个区</p>
				</div>
				<div class="addr col-md-3">
					<p>收货人:某某</p>
					<p>联系电话:xxxxxxxx</p>
					<p>配送地址:北京市 几环 哪个区</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<h3>选择支付方式</h3>
			<div id="pays">
				<label>支付宝:<input type="radio" name="pay_type" value="alipay"></label>
				<label>微信扫码:<input type="radio" name="pay_type" value="wei_sao"></label>
				<label>小high付:<input type="radio" name="pay_type" value="high_pay"></label>
			</div>
			<div><button href="#" class="button button-3d nomargin fright">确认订单并支付</button></div>
		</div>
	</div>
</section>
@endsection