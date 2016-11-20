@extends('layout.home')
@section('title','订单中心')
<!-- @section('css') -->
<style type="text/css">
		.mokuo{
			margin-bottom:20px;
		}	
		.button{
			margin-bottom: 20px;
			padding-left:10px;
		}
		.tui{
			margin-left:10px;
			padding-top:10px;
			width:200px;
			height:200px;
			background:blue;
		}
</style> 
<!-- @endsection -->
@section('content')
	<div class="container-fluid">
	<section>
		<div class="col-md-2 col-md-offset-1" >
	        <ul class="list-group">
		          <li class="list-group-item"><h5>订单中心</h5></li>
		          <li class="list-group-item"><a href="#">我的订单</a></li>
		          <li class="list-group-item"><a href="#">团购订单</a></li>
		          <li class="list-group-item"><a href="#">取消订单</a></li>
	        </ul>
	        <ul class="list-group">
		          <li class="list-group-item"><h5>关注中心</h5></li>
		          <li class="list-group-item"><a href="#">关注的美食</a></li>
		          <li class="list-group-item"><a href="#">浏览历史</a></li>
	        </ul>
	         <ul class="list-group">
		          <li class="list-group-item"><h5>设置</h5></li>
		          <li class="list-group-item"><a href="#">个人信息</a></li>
		          <li class="list-group-item"><a href="#">收获地址</a></li>
	        </ul>
	      </div>
       		<div class="col-md-8">
            <div class="contact-box">
                <a href="profile.html">
                    <div class="col-sm-2">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="/homes/geren/img/a4.jpg">
                        </div>
                    </div>

                    </a>
                    <div class="col-sm-6 col-sm-offset-1" style="padding-top:30px">
                    	<a href="#">
                       		 <h3><strong>Michael Zimber</strong></h3>
                        </a>
                    	<address>
                        	<a href="profile.html">
                        	<strong>Baidu, Inc.
                       		 </strong><br>
                       		 邮箱:xxx@baidu.com<br>
                        	</a>
	                        微博:<a href="">http://weibo.com/xxx</a><br>
	                        <abbr title="Phone">电话:</abbr> (123) 456-7890
                   		</address>
                    </div>
                    <div class="clearfix"></div>
                </div>
	        </div>
	      
	        <div class="col-md-6  mokuo pull-left" >
	       		<div class="col-sm-12">
	                <div class="ibox float-e-margins">
	                    <div class="ibox-title">
	                        <a href="#"><h5>我的订单</h5></a>
	                        <div class="ibox-tools">
	                            <a href="#">
	                                <h5>查看更多>>></h5>
	                            </a>
	                        </div>
	                    </div>
	                    <div class="ibox-content">
	                        <table class="table table-hover">
	                            <thead>
	                                <tr>
	                                    <th>商品图</th>
	                                    <th>收获人</th>
	                                    <th>价格</th>
	                                    <th>订单时间</th>
	                                    <th>订单状态</th>
	                                    <th>查看</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <tr>
	                                    <td>商品图片</td>
	                                    <td>张三</td>
	                                    <td>11111</td>
	                                    <td class="text-navy"> 2016-11-10 00:11:07</td>
	                                    <td>完成</td>
	                                    <td>查看</td>
	                                </tr>

	                                 <tr>
	                                    <td>商品图片</td>
	                                    <td>张三</td>
	                                    <td>11111</td>
	                                    <td class="text-navy"> 2016-11-10 00:11:07</td>
	                                    <td>完成</td>
	                                    <td>查看</td>
	                                	
	                                </tr>

	                                 <tr>
	                                    <td>商品图片</td>
	                                    <td>张三</td>
	                                    <td>11111</td>
	                                    <td class="text-navy"> 2016-11-10 00:11:07</td>
	                                    <td>完成</td>
	                                    <td>查看</td>
	                                </tr>
		                            </tbody>
	                        </table>
	                    </div>
	           		</div>
	       		</div>
		       	<div class="col-md-12  mokuo pull-left">
			       	<div class="ibox-title">
		                <a href="#"><h5>根据浏览 猜我喜欢</h5></a>
		            </div>
		       		<div class="col-md-4 product-grids"> 
						<div class="agile-products">
							<div class="new-tag"><h6>25%<br>Off</h6></div>
							<a href="single.html"><img src="/homes/images/f4.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single.html">Party dress</a></h5> 
								<h6><del>$20</del> $15</h6> 
								<form action="#" method="post">
									<input name="cmd" value="_cart" type="hidden">
									<input name="add" value="1" type="hidden"> 
									<input name="w3ls_item" value="Party dress" type="hidden"> 
									<input name="amount" value="15.00" type="hidden"> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form> 
							</div>
						</div> 
					</div>
					<div class="col-md-4 product-grids"> 
						<div class="agile-products">
							<div class="new-tag"><h6>25%<br>Off</h6></div>
							<a href="single.html"><img src="/homes/images/f4.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single.html">Party dress</a></h5> 
								<h6><del>$20</del> $15</h6> 
								<form action="#" method="post">
									<input name="cmd" value="_cart" type="hidden">
									<input name="add" value="1" type="hidden"> 
									<input name="w3ls_item" value="Party dress" type="hidden"> 
									<input name="amount" value="15.00" type="hidden"> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form> 
							</div>
						</div> 
					</div>
					<div class="col-md-4 product-grids"> 
						<div class="agile-products">
							<div class="new-tag"><h6>25%<br>Off</h6></div>
							<a href="single.html"><img src="/homes/images/f4.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single.html">Party dress</a></h5> 
								<h6><del>$20</del> $15</h6> 
								<form action="#" method="post">
									<input name="cmd" value="_cart" type="hidden">
									<input name="add" value="1" type="hidden"> 
									<input name="w3ls_item" value="Party dress" type="hidden"> 
									<input name="amount" value="15.00" type="hidden"> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form> 
							</div>
						</div> 
					</div>
		       	</div>
		       	<div class="col-md-4 product-grids"> 
						<div class="agile-products">
							<div class="new-tag"><h6>25%<br>Off</h6></div>
							<a href="single.html"><img src="/homes/images/f4.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single.html">Party dress</a></h5> 
								<h6><del>$20</del> $15</h6> 
								<form action="#" method="post">
									<input name="cmd" value="_cart" type="hidden">
									<input name="add" value="1" type="hidden"> 
									<input name="w3ls_item" value="Party dress" type="hidden"> 
									<input name="amount" value="15.00" type="hidden"> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form> 
							</div>
						</div> 
				</div>
		       	
	        </div>
				
		</div>
		</div>
	</section>
@endsection
