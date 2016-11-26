@extends('layout.home')
   @section('rexiao')
   @endsection
   @section('lun')
   @endsection
@section('detail')

<link href="/homes/css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="/homes/js/jquery.min.js"></script>
<script src="/homes/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/homes/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="/homes/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="/homes/css/etalage.css">
<script src="/homes/js/jquery.etalage.min.js"></script>
<script src="/homes/js/jQuery.js"></script>
<style type="text/css">
	.btn{
		width:30px;
		height:30px;
	}
</style>
<div class="col-md-9">
   <div class="single_image">
	     <ul id="etalage" class="etalage" style="display: block; width: 314px; height: 552px;">
			<li class="etalage_thumb thumb_1" style="display: none; background-image: none; opacity: 0;">
				<a href="optionallink.html">
					<img class="etalage_thumb_image" src="{{$pics->path}}" style="display: inline; width: 300px; height: 400px; opacity: 1;">
					<img class="etalage_source_image" src="{{$pics->path}}" alt="">
				</a>
			</li>
			<li class="etalage_thumb thumb_2" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="{{$pics->path}}" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="{{$pics->path}}" alt="">
			</li>
			<li class="etalage_thumb thumb_3" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="{{$pics->path}}" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="{{$pics->path}}" alt="">
			</li>
			<li class="etalage_thumb thumb_4" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="{{$pics->path}}" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="{{$pics->path}}" alt="">
			</li>
			<li class="etalage_thumb thumb_5 etalage_thumb_active" style="background-image: none; display: list-item; opacity: 1;">
				<img class="etalage_thumb_image" src="{{$pics->path}}" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="{{$pics->path}}" alt="">
			</li>
			<li class="etalage_thumb thumb_6" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="{{$pics->path}}" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="{{$pics->path}}" alt="">
			</li>
			<li class="etalage_thumb thumb_7" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="{{$pics->path}}" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="{{$pics->path}}" alt="">
			</li>
		<li class="etalage_magnifier" style="margin: 0px; padding: 0px; display: none; left: 6px; top: 67px; opacity: 0;"><div style="margin: 0px; padding: 0px; width: 195px; height: 179px;"><img style="margin: 0px; padding: 0px; width: 300px; height: 400px; display: inline; left: 0px; top: -61px;" src="{{$pics->path}}"></div></li><li class="etalage_icon" style="display: list-item; top: 290px; left: 20px; opacity: 1;">&nbsp;</li><li class="etalage_hint" style="display: none; margin: 0px; top: -15px; right: -15px;">&nbsp;</li><li class="etalage_zoom_area" style="margin: 0px; left: 324px; display: none; background-image: none; opacity: 0;"><div class="etalage_description" style="width: 546px; bottom: 6px; left: 6px; opacity: 0.7; display: none;"></div><div style="width: 586px; height: 538px;"><img class="etalage_zoom_img" style="width: 900px; height: 1200px; left: -252.644px; top: -500.371px;" src="{{$pics->path}}"></div></li><li class="etalage_small_thumbs" style="width: 314px; top: 424px;"><ul style="width: 1072px;"><li class="etalage_smallthumb_navtoend" style="margin: 0px 10px 0px 0px; opacity: 0.4; left: -432px;"><img class="etalage_small_thumb" src="/homes/images/s1.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: -432px;" class=""><img class="etalage_small_thumb" src="/homes/images/s1.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: -432px;" class=""><img class="etalage_small_thumb" src="{{$pics->path}}" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: -432px;" class=""><img class="etalage_small_thumb" src="/homes/images/s3.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: -432px;" class="etalage_smallthumb_first"><img class="etalage_small_thumb" src="/homes/images/s1.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 1; left: -432px;" class="etalage_smallthumb_active"><img class="etalage_small_thumb" src="{{$pics->path}}" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: -432px;" class="etalage_smallthumb_last"><img class="etalage_small_thumb" src="{{$pics->path}}" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: -432px;" class=""><img class="etalage_small_thumb" src="{{$pics->path}}" style="width: 90px; height: 120px;" width="90"></li><li class="etalage_smallthumb_navtostart" style="margin: 0px 10px 0px 0px; opacity: 0.4; left: -432px;"><img class="etalage_small_thumb" src="{{$pics->path}}" style="width: 90px; height: 120px;" width="90"></li></ul></li></ul>
	    </div>
	    <!-- 菜品  start -->
	    <div class="single_right">
	    	<br>
        	<h3>{{$one->name}}</h3>
        	<p class="m_5">{{$one->title}}</p>
        	<div class="price_single">
			  <span class="reducedfrom">￥66.00</span>
			  <span class="actual1">￥:{{$one->price}}</span>
			</div>
			<style type="text/css">
				#flavor1 li{
					text-align:center;
					width:60px;
					text-align:center;
					background:white;
					margin-left:10px;
					cursor:pointer;
				}
			</style>
			<div class="btn_form">
			   <form action="/cart/add" method="post">
			   		<span class="">订购份数:</span>
			   		<div class="btn-group btn-group-sm">
					  <button type="button" class="btn btn-default" id="btn1">-</button>
					  <input type="text" id = "cou" name="num" style="width:20px;height:30px;text-align:center 
					  " value="1">
					  <button type="button" class="btn btn-default pull-right" id="btn2">+</button>
					</div>
					<br>
					<br>
					<div id="flavor1">
						<ul class="list-unstyled list-inline" name = "kouwei">口味:
							<li class="flavor">正常</li>
							<li class="flavor">清淡</li>
							<li class="flavor">偏重</li>
							<li class="flavor">免辣</li>
						</ul>
					</div>
					<div class="pull-right">
						<span><a href="">点击收藏</a></span>
					</div>
					<br> 
					{{csrf_field()}}
					<input type="hidden" name="goods_id" value="{{$one->id}}">
					<input type="hidden" name="kouwei" value="">
			   		<br>
			   		<div id="clearfix"></div>
				 <input value="加入购物车" title="" type="submit">
				
			  </form>
			</div>
			<ul class="add-to-links">
              <li><img src="/homes/images/wish.png" alt=""><a href="#">销量: {{$one->sold}}</a></li>
            </ul>
            
			<!-- 分享  start -->
            <div class="col-xs-12  col-sm-6  col-md-4">
              <!-- JiaThis Button BEGIN --><div id="ckepop">
				<span class="jiathis_txt">分享到：</span>
				<a class="jiathis_button_weixin">微信</a> 
				<a href="http://www.jiathis.com/share"  class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
				<a class="jiathis_counter_style"></a> </div> 
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>
				</div> <!-- JiaThis Button END -->
			</div>
			<!-- 分享  end -->
		   </div>
	    	<!-- 菜品  end -->

			<div class="product-reviwes">
				<script src="/homes/js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="/homes/js/zengjian.js"></script>
				<div class=" col-md-12 pull-right" style="position:absolute;top:200px;">
				<div class="clearfix"> </div>
		    </div>
		      
		      <!-- 细说菜品  start -->

		     <div class="col-md-8 pull-right" style="border:solid 0px red">
		        <div id="myTabs">
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">菜品介绍</a></li>
				    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">菜品追溯</a></li>
				    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">菜品评价</a></li>
				    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"></a></li>
				  </ul>
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="home">{{$one->zuof}}</div>
				    <div role="tabpanel" class="tab-pane" id="profile">菜品追溯内容</div>
				    <div role="tabpanel" class="tab-pane" id="messages">菜品评价</div>
				    <div role="tabpanel" class="tab-pane" id="settings">...</div>
				  </div>
				</div>
			</div>
		      <!-- 细说菜品  end -->
				<div class="clearfix"> </div>
		      	<div class="col-md-9 pull-right" style="border:solid 1px red ">
		      	{{$one->detail}}
		      </div>
		   	<div class="clearfix"> </div>
			</div>
				
<div class="clearfix"> </div>   	
@endsection