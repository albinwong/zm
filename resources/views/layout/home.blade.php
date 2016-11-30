<!DOCTYPE html>
<html>
 <head> 
  <title>@yield('title','追梦在线订餐网')</title> 
  <link href="/homes/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
  <link href="/homes/css/cart.css" rel="stylesheet" type="text/css" /> 
  <script src="/homes/js/jquery.min.js"></script> 
  <script src="/homes/js/bootstrap.min.js"></script> 
  <script src="/homes/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/homes/css/bootstrap.min.css">
  <link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
  <script type="text/javascript" src="/homes/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/homes/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="/homes/js/moyan.js"></script> 
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="/homes/js/jquery.min.js"></script> 
  <!-- Custom Theme files --> 
  <link href="/homes/css/style.css" rel="stylesheet" type="text/css" /> 
  <link href="/homes/css/menu.css" rel="stylesheet" type="text/css" /> 
  <!-- Custom Theme files --> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>  
  <!--webfonts--> 
  <link href="http://fonts.googleapis.com/css?family=Exo+2:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" type="image/x-icon" href="/homes/images/logo.ico" media="screen" />
  <script type="text/javascript" src="/homes/js/bootstrap.min.js"></script>
  <style type="text/css">  
.login{
    padding:20px;
    margin:20px;
}

ul,li {
    list-style: none;
}

.login-box {
    padding: 50px;
    border-radius: 10px;
    border:1px solid #ddd;
    background:#ddd;
    opacity:0.8;

}

.login-box .name,.login-box .password,.login-box .code,.login-box{
    font-size: 16px;
    /*color:orange;*/
}

.login-box label {
    display: inline-block;
    width: 100px;
    text-align: right;
    vertical-align: middle;
}

.modal-content input[type=text],input[type=password] {
  width: 220px;
  height: 42px;
  margin-top: 30px;
  padding:  0px 15px;
  border: 1px solid rgba(255,255,255,.15);
  border-radius: 6px;
  letter-spacing: 2px;
  font-size: 16px;
  opacity: 0.7;
}

.login button {
    cursor: pointer;
    width: 100%;
    height: 44px;
    padding: 0;
    background: #ef4300;
    border: 1px solid #ff730e;
    border-radius: 6px;
    color: #fff;
    font-size: 24px;
    letter-spacing: 15px;
    text-shadow: 0 1px 2px rgba(0,0,0,.1);
}
    #test{
        width:300px;
        height:20px;
        overflow:hidden;
    }
  .daohang{
    position:relative;
    padding-bottom:100px;
    top:-20px;
    color:#abc; 
  }
  </style>
 </head> 
 <body> 
 <!-- 头部start -->
 @section('header')
  <div class="header">
    <div class="container">
      <div class="header_top">
      <ul class="phone">
        <li class="phone_left">
        <iframe width="300" scrolling="no" height="15" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=11&color=%23C6C6C6&bgc=%23&icon=1"></iframe></li>
        <li class="phone_right">
          <marquee id="test"  scrollamount="3" scrolldelay="200" direction="up">
            <li>【最新公告】北京六环以内免费配送</li><br>
            <li>【食品安全】食品安全有保障，绿色消费享健康</li><br>
            <li>【食品安全】从源头抓质量，确保食品安全</li>
          </marquee>
        </li>
        <div class="clearfix"></div>
      </ul>
      <div class="col-md-6 col-lg-offset-4 pull-right">
        <div class="account">
          <ul class="list-unstyled list-inline pull-right daohang">
            <li>
              <?php 
                $t = date("H",time());
                if ($t>=7 && $t<9) {
                  echo '早上好';
                }else if($t>=9 && $t<11){
                  echo '上午好';
                }else if($t>=11 && $t<13){
                  echo '中午好';
                }else if($t>=13 && $t<19){
                  echo '下午好';
                }else if($t>=19 && $t<23){
                  echo '晚上好';
                }else{
                  echo '凌晨好';
                }
                if(!empty(session('uid'))){
                  echo "&emsp;欢迎".session('uname')."来访 <a href='/logout' style='text-decoration:none;color:red;'>退出</a>";
                }else{
                  echo "&emsp;<a href='/login' id='userLogin' onclick='return false;' style='text-decoration:none;color:#abc'>请登录</a> | <a href='/register' style='text-decoration:none;color:red;'>免费注册</a>";
                }?>
            </li><li>&nbsp;<a href="#" style="color:#abc">个人中心</a></li><li>&nbsp;<a href="/order" style="color:#abc">我的订单</a></li>
          </ul>
      </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="header_bottom"> 
     <div class="header_nav"> 
      <div class="logo"> 
      <a href="/" style="position:relative;"><img src="/homes/images/logo.png" style="width:120px;height:117px;"></a>
      </div>
      <nav class="navbar navbar-default menu" role="navigation">

        <h3 class="nav_right">
          <a href="index.html">
            <img src="/homes/images/logo.png" class="img-responsive" alt="" />
          </a>
        </h3> 

       <div class="container-fluid"> 

        <!-- Brand and toggle get grouped for better mobile display --> 
        <div class="navbar-header"> 

         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> 
        </div> 
        <!-- Collect the nav links, forms, and other content for toggling --> 
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
       

         <ul class="nav navbar-nav menu1"> 
          <li><a href="/">首页</a></li> 
          <li><a href="fruits.html">Fruits &amp; Veg</a></li> 
          <li><a href="products.html">Food Products</a></li> 
          <li><a href="store.html">Locate Store</a></li> 
          <li><a href="club.html">Fan Club</a></li> 
          <li><a href="/notes/show">留言板</a></li> 
         </ul> 
         <ul class="shopping_cart login">
         <a href="cart"><li class="shop_left"><i class="cart"> </i><span>购物车</span></li></a>
         <a href="order"><li class="shop_right"><span>我的订单</span></li></a>
         <div class="clearfix"> </div>
        </ul>
         <div class="clearfix"></div> 
        </div>
        <!-- /.navbar-collapse --> 
       </div>
       <!-- /.container-fluid --> 
      </nav> 
      <div class="clearfix"></div> 
     </div> 
     <div class="search"> 
     <form action="/glist" method="get">
      <input type="text" class="text" placeholder="请输入关键字" value="{{old('keyword')}}" name="keyword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入关键字';}" /> 
      <input type="submit" value="搜索" /> 
     </form>
     </div> 
    </div> 
   </div> 
  </div> 
  @show
  <!-- 头部end -->
  <!-- 左侧内容start -->
 
  @section('content')
  <div class="main"> 
    
    @include('home.goods.advert')
   
    <div class="container"> 
    <!-- 轮播 start-->
    @section('lun')
    <div class="banner"> 
      <div id="carousel-example-generic" class="carousel slide img-responsive" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          <li data-target="#carousel-example-generic" data-slide-to="3"></li>
          <li data-target="#carousel-example-generic" data-slide-to="4"></li>
          <li data-target="#carousel-example-generic" data-slide-to="5"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="/homes/images/banner1.jpg" alt="...">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="/homes/images/banner2.jpg" alt="...">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="/homes/images/banner3.jpg" alt="...">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="/homes/images/banner4.jpg" alt="...">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="/homes/images/banner5.jpg" alt="...">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="/homes/images/banner6.jpg" alt="...">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        </a>
      </div>
    </div> 
    <!-- 轮播 end-->
   @show 
   
    <div class="row content">
	<!-- 左侧内容start -->
    @section('content_left')
     <div class="col-md-3 content_top">
     @section('menu')
	     <!-- 菜单 start -->
	      <div class="category_box">
	     	<h3 class="cate_head">特色菜系</h3> 
		      <div class="box">
		      <?php 
		        $cates = \App\Http\Controllers\CateController::getAllCates(0);
		       ?>
		        <ul>
		       @foreach($cates as $k=>$v)
		            <li><a href="/glist?cate_id={{$v->id}}">{{$v->name}}</a>
		                <ul>
		                  @foreach($v->subcate as $a=>$b)
		                  <li><a href="/glist?cate_id={{$b->id}}" class="">{{$b->name}}</a>
		                    <ul>
		                      @foreach($b->subcate as $c=>$d)
		                      <li><a href="/glist?cate_id={{$d->id}}" class="thirdh">{{$d->name}}</a></li>
		                      @endforeach
		                    </ul>
		                  </li>
		                  @endforeach
		                  </ul>
		            </li>
		        @endforeach
		        </ul>
		      </div>
	  	  </div>
	     <!-- 菜单 end -->
     @show
      <ul class="product_reviews"> 
       <h3><i class="arrow"> </i><span>Product Reviews</span></h3> 
       <li> 
        <ul class="review1"> 
         <li class="review1_img"><img src="/homes/images/pic1.jpg" class="img-responsive" alt="" /></li> 
         <li class="review1_desc"><h3><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></h3><p>Wed, June 2014</p></li> 
         <div class="clearfix"> 
         </div> 
        </ul> </li> 
       <li> 
        <ul class="review1"> 
         <li class="review1_img"><img src="/homes/images/pic2.jpg" class="img-responsive" alt="" /></li> 
         <li class="review1_desc"><h3><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></h3><p>Wed, June 2014</p></li> 
         <div class="clearfix"> 
         </div> 
        </ul> </li> 
       <li> 
        <ul class="review1"> 
         <li class="review1_img"><img src="/homes/images/pic3.jpg" class="img-responsive" alt="" /></li> 
         <li class="review1_desc"><h3><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></h3><p>Wed, June 2014</p></li> 
         <div class="clearfix"> 
         </div> 
        </ul> </li> 
       <div class="but"> 
        <a href="#">More Reviews<i class="but_arrow"> </i></a> 
       </div> 
      </ul> 
      <ul class="product_reviews"> 
       <h3><i class="arrow"> </i><span>支付方式</span></h3> 
       <img src="/homes/images/payment.png" class="img-responsive" alt="" /> 
      </ul> 
     </div> 
    @show
    <!-- 左侧内容end -->
    <!-- 右侧内容start -->
    @section('content_right')
    	@section('rexiao')
     <!-- 内容右侧start -->
     <div class="col-md-9"> 
      <!-- 今日热销 start -->
      <ul class="feature"> 
       <h3><i class="arrow"> </i><span>今日热销</span></h3> 
      </ul> 
      <ul class="feature_grid"> 
       <li class="grid1"><img src="/homes/images/f1.jpg" class="img-responsive" alt="" /> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed</p> 
        <div class="price">
         Price: 
         <span class="actual">$12.00</span> 
        </div> 
        <div class="but1"> 
         <a href="#">Buy Now</a> 
        </div> </li> 
       <li class="grid1"><img src="/homes/images/f2.jpg" class="img-responsive" alt="" /> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed</p> 
        <div class="price">
         Price: 
         <span class="actual">$12.00</span> 
        </div> 
        <div class="but1"> 
         <a href="#">Buy Now</a> 
        </div> </li> 
       <li class="grid2"><img src="/homes/images/f3.jpg" class="img-responsive" alt="" /> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed</p> 
        <div class="price">
         Price: 
         <span class="actual">$12.00</span> 
        </div> 
        <div class="but1"> 
         <a href="#">Buy Now</a> 
        </div> </li> 
       <div class="clearfix"> 
       </div> 
      </ul> 
    	@show
     	 <!-- 今日热销 end -->
      	<!-- 右侧下部start -->
     	 @section('detail')
	      <ul class="feature"> 
	       <h3><i class="arrow"> </i><span>促销</span></h3> 
	      </ul> 
	      <div class="row content_bottom"> 
	       <div class="col-md-3"> 
	        <div class="content_box">
	         <a href="single.html"> 
	          <div class="view view-fifth"> 
	           <img src="/homes/images/p1.jpg" class="img-responsive" alt="" /> 
	           <div class="content_box-grid"> 
	            <p class="m_1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p> 
	            <div class="price">
	             Price: 
	             <span class="actual">$12.00</span> 
	            </div> 
	            <ul class="product_but"> 
	             <li class="but3">Buy</li> 
	             <li class="like"><span>120</span><i class="like1"> </i></li> 
	             <div class="clearfix"> 
	             </div> 
	            </ul> 
	            <div class="mask"> 
	             <div class="info">
	              Quick View
	             </div> 
	            </div> 
	           </div> 
	          </div> </a> 
	        </div> 
	       </div> 
	       <div class="col-md-3"> 
	        <div class="content_box">
	         <a href="single.html"> 
	          <div class="view view-fifth"> 
	           <img src="/homes/images/p4.jpg" class="img-responsive" alt="" /> 
	           <div class="content_box-grid"> 
	            <p class="m_1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p> 
	            <div class="price">
	             Price: 
	             <span class="actual">$12.00</span> 
	            </div> 
	            <ul class="product_but"> 
	             <li class="but3">Buy</li> 
	             <li class="like"><span>120</span><i class="like1"> </i></li> 
	             <div class="clearfix"> 
	             </div> 
	            </ul> 
	            <div class="mask"> 
	             <div class="info">
	              Quick View
	             </div> 
	            </div> 
	           </div> 
	          </div> </a> 
	        </div> 
	       </div> 
	       <div class="col-md-3"> 
	        <div class="content_box">
	         <a href="single.html"> 
	          <div class="view view-fifth"> 
	           <img src="/homes/images/p3.jpg" class="img-responsive" alt="" /> 
	           <div class="content_box-grid"> 
	            <p class="m_1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p> 
	            <div class="price">
	             Price: 
	             <span class="actual">$12.00</span> 
	            </div> 
	            <ul class="product_but"> 
	             <li class="but3">Buy</li> 
	             <li class="like"><span>120</span><i class="like1"> </i></li> 
	             <div class="clearfix"> 
	             </div> 
	            </ul> 
	            <div class="mask"> 
	             <div class="info">
	              Quick View
	             </div> 
	            </div> 
	           </div> 
	          </div> </a> 
	        </div> 
	       </div> 
	       <div class="col-md-3"> 
	        <div class="content_box">
	         <a href="single.html"> 
	          <div class="view view-fifth"> 
	           <img src="/homes/images/p2.jpg" class="img-responsive" alt="" /> 
	           <div class="content_box-grid"> 
	            <p class="m_1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p> 
	            <div class="price">
	             Price: 
	             <span class="actual">$12.00</span> 
	            </div> 
	            <ul class="product_but"> 
	             <li class="but3">Buy</li> 
	             <li class="like"><span>120</span><i class="like1"> </i></li> 
	             <div class="clearfix"> 
	             </div> 
	            </ul> 
	            <div class="mask"> 
	             <div class="info">
	              Quick View
	             </div> 
	            </div> 
	           </div> 
	          </div> </a> 
	        </div> 
	       </div> 
	      </div> 
	 	 @show
		<!-- 右侧下部end -->

      
     	<!-- 分页start -->
   	 	@section('fenye')
      	<ul class="dc_pagination dc_paginationA dc_paginationA06"> 
	       <li><a href="#">1</a></li> 
	       <li><a href="#" class="current">2</a></li> 
	       <li><a href="#">3</a></li> 
	       <li><a href="#">4</a></li> 
	       <li><a href="#">5</a></li> 
	       <li><a href="#">...</a></li> 
	       <li><a href="#">19</a></li> 
	       <li><a href="#">20</a></li> 
	       <li><a href="#" class="previous">Next&gt;</a></li> 
	       <li><a href="#" class="next">Last&gt;&gt;</a></li> 
        </ul>
   	 	@show
	      <!-- 分页end  -->
	     </div> 
	    </div> 
	   </div> 
	  </div> 
  	@show
  <!-- 内容右部 end-->
  @show
  <!-- 内容end -->
  <!-- 顶部start -->
  @section('footer')
  <div class="footer"> 
   <div class="container"> 
    <div class="footer-grid footer-grid1"> 
     <h3 class="m_2">关于我们</h3> 
     <ul class="list1"> 
      <li><a href="/">主页</a></li> 
      <li><a href="#">关于我们</a></li> 
      <li><a href="http://weibo.com/319333577/home?wvr=5&topnav=1&wvr=6&mod=logo#_rnd1480332445151">新浪微博</a></li> 
      <li><a href="http://wpa.qq.com/msgrd?v=3&uin=365354990&site=qq&menu=yes" target="_blank">在线客服</a></li> 
      <li><a href="/admin" target="_blank">管理中心</a></li> 
      <li><a href="#">加入我们</a></li> 
     </ul> 
    </div> 
    <div class="footer-grid footer-grid2"> 
     <h3 class="m_2">Company</h3> 
     <ul class="list1"> 
      <li><a href="/links">友情链接</a></li>
      <li><a href="#">diam nonummy nibh euismod</a></li> 
      <li><a href="#">nostrud exerci tation</a></li> 
      <li><a href="#">hendrerit in vulputate velit</a></li> 
      <li><a href="#">soluta nobis eleifend option</a></li> 
      <li><a href="#">dynamicus, qui sequitur</a></li> 
     </ul> 
    </div> 
    <div class="footer-grid footer-grid3"> 
     <h3 class="m_2">Information</h3> 
     <ul class="list1"> 
      <li><a href="#">My Account</a></li> 
      <li><a href="#">Rewards</a></li> 
      <li><a href="#">Terms &amp; Conditions</a></li> 
      <li><a href="#">Buying Guide</a></li> 
      <li><a href="#">FAQ</a></li> 
     </ul> 
    </div> 
    <div class="footer-grid footer-grid4"> 
     <h3 class="m_2">分享至</h3> 
     <ul class="footer_social"> 
      <div class="bshare-custom icon-medium">
        <a title="分享到QQ好友" class="bshare-qqim">
        </a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
        <a title="分享到微信" class="bshare-weixin"></a>
        <a title="分享到QQ空间" class="bshare-qzone"></a>
        <a title="分享到i贴吧" class="bshare-itieba"></a>
        <a title="分享到人人网" class="bshare-renren"></a>
       </div>
      <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script>
      <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
      <div class="clearfix"> 
      </div> 
     </ul> 
     <h3 class="m_3">Subscribe</h3> 
     <p class="m_4">aliquam erat volutpat. Ut wisi</p> 
     <div class="footer_search"> 
      <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}" /> 
      <input type="submit" value="Search" /> 
     </div> 
    </div> 
    <div class="footer-grid footer-grid_last"> 
     <ul class="secure"> 
      <li class="secure_img"><img src="/homes/images/secure.png" alt="" /></li> 
      <li class="secure_desc">Lorem ipsum dolor coadipiscing</li> 
      <div class="clearfix"> 
      </div> 
     </ul> 
     <ul class="secure"> 
      <li class="secure_img"><img src="/homes/images/order.png" alt="" /></li> 
      <li class="secure_desc">Lorem ipsum dolor coadipiscing</li> 
      <div class="clearfix"> 
      </div> 
     </ul> 
    </div> 
    <div class="clearfix"> 
    </div> 
    <div class="copy col-md-offset-4"> 
     <p>Copyright &copy; 2016.zm Co.,Ltd All rights reserved.</p> 
    </div> 
   </div> 
  </div> 
  @show
<!-- 底部end --> 
<!-- 模态提示框 start-->
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <!-- 模态表单start -->
        <div class="login-box">  
        <h1 style="text-align:center;color:red;">会员登录</h1><br><br>
        <form action="/dologin" method="post">  
            <div class="name">  
            用户名：
            <input type="text" name="username" placeholder="请输入您的用户名"><span></span>
            </div>  
            <div class="password">  
           密&emsp;码：
            <input type="password"  maxlength="16" name="password" placeholder="请输入您的密码"><span></span>
            </div>  
            <div class="code">  
                验证码：  
                <input id="code" type="text" maxlength="6" placeholder="请输入验证码" name="code">
                    <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="codeImg" border="0"><span></span>
                {{csrf_field()}}
            </div>
            <div class="login">  
                <button>登录</button>  
            </div> 
             <span><a href="/forget" style="text-decoration:none;">忘记密码</a></span> 
        </form>  
        <!-- 模态表单end -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- 模态提示框 end-->
 </body>
</html>
