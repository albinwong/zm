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
	.media{
		padding-top:20px;
	}
	.btn{
		width:30px;
		height:30px;
	}
	#flavor1 li{
			text-align:center;
			width:60px;
			text-align:center;
			background:white;
			margin-left:10px;
			cursor:pointer;
		}
</style>
<div class="col-md-9">
   <div class="single_image">
     <ul id="etalage" class="etalage" style="display: block; width: 314px; height: 552px;">
		<li class="etalage_thumb thumb_1 etalage_thumb_active" style=" background-image: none; opacity: 1;">
			@foreach($pics as $k=>$v)
			<a href="#">
				<img class="etalage_thumb_image" src="{{$v->path}}" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="{{$v->path}}" alt="">
			</a>
			@endforeach
		</li>
	 </ul>
    </div>
	    <!-- 菜品  start -->
	    <div class="single_right">
	    	<br>
        	<h3>{{$one->name}}</h3>
        	<p class="m_5">{{$one->title}}</p>
        	<div class="price_single">
			  <span class="reducedfrom">￥{{$one->price*1.2}}</span>
			  <span class="actual1">￥:{{$one->price}}</span>
			</div>
			
			<div class="btn_form">
				<ul class="product_but"> 
		             <button id="guan" goods_id='{{$one->id}}' style="background:#FFFFF2;width:100px;height:40px;border:1px solid #ff730e;border-radius: 6px;letter-spacing: 15px;" class="pull-right"><li class="like">关注<i class="like1"></i></li> </button>
		             <div class="clearfix"></div> 
	            </ul>
	            <script type="text/javascript">
	            	 $('#guan').click(function(){
	            	 	var goods_id=$(this).attr('goods_id');
	            	 	$.get('/guan',{'goods_id':goods_id},function(data){
	            	 		if(data==1){
	            	 			$('#guan li').html('<li style="width:100px;word-spacing:8px;letter-spacing:1px;">取消关注<li>');
	            	 			alert('关注成功');
	            	 		}else{
	            	 			$('#guan li').html('关注');
	            	 			alert('已取消关注');
	            	 		}
	            	 	});
	            	 	
	            	 });
	            </script>
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
					<script type="text/javascript">
						var btn1 = document.getElementById('btn1');
						var btn2 = document.getElementById('btn2');
						var count = document.getElementById('cou');
						//数量减
						btn1.onclick = function(){
							var jian = count.value;
							if(jian<=1){
								return false;
							}
							count.value = (--jian);
						}
						//数量加
						btn2.onclick = function(){
							var jian = count.value;
							count.value = (++jian);
						}
						$('.flavor').click(function(){
							//给所有同辈元素设置背景色
							$(this).siblings().css('background','whrite');
							//给自己设置背景色
							$(this).css('background','#ddd');
							//获取当前点击的li里的内容
							var v = $(this).html();
							//给隐藏域name="kouwei"的val赋值
							$('input[name="kouwei"]').val(v);
						});


					</script>
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
            <!-- 收藏 start-->
			<a href=# onclick="javascript:addFavorite2()" rel="sidebar">加入书签</a>
			
			<script type="text/javascript">
				function addFavorite2() {
				    var url = window.location;
				    var title = document.title;
				    var ua = navigator.userAgent.toLowerCase();
				    if (ua.indexOf("360se") > -1) {
				        alert("由于功能受限制，请按 Ctrl+D 手动收藏！");
				    }
				    else if (ua.indexOf("msie 8") > -1) {
				        window.external.AddToFavoritesBar(url, title); //IE8
				    }
				    else if (document.all) {
				  try{
				   		window.external.addFavorite(url, title);
				  }catch(e){
				   alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
				  }
				    }
				    else if (window.sidebar) {
				        window.sidebar.addPanel(title, url, "http://zm.com");
				    }
				    else {
				  alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
				    }
				}
			</script>
			<!-- 收藏 end-->
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
				<script type="text/javascript">
					$(document).ready(function () {
						 $('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion           
								width: 'auto', //auto or any width like 600px
								fit: true,   // 100% fit in a container
								closed: 'accordion', // Start closed if in accordion view
								activate: function(event) { // Callback function if tab is switched
								var $tab = $(this);
								var $info = $('#tabInfo');
								var $name = $('span', $info);
									$name.text($tab.text());
									$info.show();
								}
							});
												
						 $('#verticalTab').easyResponsiveTabs({
								type: 'vertical',
								width: 'auto',
								fit: true
							 });
					 });
				</script>
			<div class=" col-md-12 pull-right" style="position:absolute;top:200px;">
     		<div class="clearfix"> </div>
			</div>
		      
		      <!-- 细说菜品  start -->

		      <div class="col-md-8 pull-right" style="border:solid 0px red">
		        <div id="myTabs">

					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">菜品介绍</a></li>
					    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">菜品评价</a></li>
					    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"></a></li>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="home">{!!$one->detail!!}</div>
					   
					    <div role="tabpanel" class="tab-pane" id="messages">
							@foreach($data as $k=>$v)
                            <div class="media">
								<div class="col-md-2">
									<a class="media-left media-middle" href="">
                                		<img src="{{$v->profile}}" data-src="" style="width:40px;height:40px;" alt="" class="img-circle">
                              		</a>
                              		<br>
                              		<div class="media-body">
                               			<h4 class="media-heading"> {{$v->name}}</h4>
                              		</div>
								</div>  
								<div class="col-md-6">                           
	                                <div class="media-body" >
	                                 <h5 class="media-heading" >{{$v->detail}}</h5>
	                                </div>
	                                <br>
	                                <div class="photo" id="tupian">
	                                    <div class="media-body">
	                                        <ul class="ul list-unstyled list-inline">
	                                            <li data-src="{{$v->pics}}">
	                                                <img src="{{$v->pics}}" width="40px;" alt="">
	                                            </li>
	                                        </ul> 
	                                    </div>
	                                    <div class="big-photo hide">
	                                        <ul class="ul list-unstyled">
	                                           <img src="{{$v->pics}}" width="200px;" alt="">
	                                        </ul>
	                                    </div>
	                                </div>
	                                <div class="media-body">
	                                    {{date('Y年m月d日 H:i:s',$v->regtime)}}
	                                </div>
	                            </div>
                            </div>
                            <hr>
                          @endforeach
					    </div>
					    <div role="tabpanel" class="tab-pane" id="settings">...</div>
					  </div>
					  <script type="text/javascript">
		      		$("#myTabs a").click(function (e) {
					  e.preventDefault()
					  $(this).tab('show') 
					})
						$('#myTabs a[href="#profile"]').tab('show');
						$('#myTabs a:first').tab('show');
						$('#myTabs a:last').tab('show');
						$('#myTabs li:eq(2) a').tab('show');
		      </script>

					</div></div>
		      <!-- 细说菜品  end -->

				<div class="clearfix"> </div>
			</div>
<div class="clearfix"> </div>   	
@endsection
@section('fenye')
@endsection