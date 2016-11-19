@extends('layout.home')

@section('content')

    <div class="main">
		<div class="container">
		  <div class="Product_top">
		   <div class="row content">
		   	<div class="col-md-3">
		   	   <div class="category_box">
		   	  	<h3 class="cate_head">Categories</h3>
		   	     <ul class="category">
			   	  	<li><a href="#">Arts</a></li>
			   	  	<li><a href="#">Beauty</a></li>
			   	  	<li><a href="#">Books</a></li>
			   	  	<li><a href="#">Cart Software</a></li>
			   	  	<li><a href="#">Electronics</a></li>
			   	  	<li><a href="#">Fashion / Clothing</a></li>
			   	  	<li><a href="#">Food</a></li>
			   	  	<li><a href="#">Furniture</a></li>
			   	  	<li><a href="#">Home Goods</a></li>
			   	  	<li><a href="#">Jewelry</a></li>
			   	  	<li><a href="#">Lingerie</a></li>
			   	  	<li><a href="#">Music</a></li>
			   	  	<li><a href="#">Office Supplies</a></li>
			   	  	<li><a href="#">Printing</a></li>
			   	  	<li><a href="#">Software</a></li>
		   	     </ul>
		   	   </div>
		   	   <ul class="product_reviews">
		   	   	<h3><i class="arrow"> </i><span>Product Reviews</span></h3>
		   	   	<li>
		   	   		<ul class="review1">
		   	   			<li class="review1_img"><img src="/homes/images/pic1.jpg" class="img-responsive" alt=""/></li>
		   	   			<li class="review1_desc"><h3><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></h3><p>Wed, June 2014</p></li>
		   	   			<div class="clearfix"> </div>
		   	   		</ul>
		   	   	</li>
		   	   	<li>
		   	   		<ul class="review1">
		   	   			<li class="review1_img"><img src="/homes/images/pic2.jpg" class="img-responsive" alt=""/></li>
		   	   			<li class="review1_desc"><h3><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></h3><p>Wed, June 2014</p></li>
		   	   			<div class="clearfix"> </div>
		   	   		</ul>
		   	   	</li>
		   	   	<li>
		   	   		<ul class="review1">
		   	   			<li class="review1_img"><img src="/homes/images/pic3.jpg" class="img-responsive" alt=""/></li>
		   	   			<li class="review1_desc"><h3><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></h3><p>Wed, June 2014</p></li>
		   	   			<div class="clearfix"> </div>
		   	   		</ul>
		   	   	</li>
		   	    <div class="but">
			       <a href="#">More Reviews<i class="but_arrow"> </i></a>
			    </div>
		   	   </ul>
		   	   <ul class="product_reviews">
		   	   	 <h3><i class="arrow"> </i><span>Payment Methods</span></h3>
		   	   	 <img src="/homes/images/payment.png" class="img-responsive" alt=""/>
		   	   </ul>
		   	</div>
		   	<div class="col-md-9">
		   	 <div class="register_account">
          <form>
    			   
		          <div><input type="text" value="City" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}"></div>
		          <button class="grey">Search</button>
		      </form>
    	   </div>	
    	   
    	    <div class="row content_bottom"> 
    	    	@foreach($goods as $k=>$v)
			   	   <div class="col-md-3">
			   	   	<div class="content_box"><a href="single.html">
			   	   	  	<div class="view view-fifth">
			   	   	     <img src="/homes/images/p1.jpg" class="img-responsive" alt="">
				   	   	 <div class="content_box-grid">
				   	   	  <p class="m_1">{{$v->name}}</p>
				   	   	  <div class="price">价格￥:
						    <span class="actual">{{$v->price}}</span>
						  </div>
						  <ul class="product_but">
						  	<li class="but3">加入购物车</li>
						  	<li class="like"><span>120</span><i class="like1"> </i></li>
						  	<div class="clearfix"> </div>
						  </ul>
						   <div class="mask">
	                         <div class="info">Quick View</div>
			               </div>
			             </div>
				   	   	</div>
			   	   	   </a>
			   	   	  </div>
			   	   </div>
			   	@endforeach
			</div>
		 
	    </div>
	  </div>
	 </div>
	</div>
    <div class="footer">
		<div class="container">
			<div class="footer-grid footer-grid1">
			  <h3 class="m_2">Company</h3>
			  <ul class="list1">
			  	<li><a href="#">Home</a></li>
			    <li><a href="#">About Us</a></li>
			    <li><a href="#">Blog</a></li>
			    <li><a href="#">Latest News</a></li>
			    <li><a href="#">Login</a></li>
			    <li><a href="#">Join Us</a></li>
			  </ul>
		   </div>
		   <div class="footer-grid footer-grid2">
			  <h3 class="m_2">Company</h3>
			  <ul class="list1">
			  	<li><a href="#">Lorem ipsum dolor sit amet</a></li>
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
			    <li><a href="#">Terms & Conditions</a></li>
			    <li><a href="#">Buying Guide</a></li>
			    <li><a href="#">FAQ</a></li>
			  </ul>
		   </div>
		   <div class="footer-grid footer-grid4">
			   <h3 class="m_2">Let's be friends</h3>
			   <ul class="footer_social">
				 <li><a href=""> <i class="tw"> </i> </a></li>
				 <li><a href=""><i class="fb"> </i> </a></li>
				 <li><a href=""><i class="rss"> </i> </a></li>
				 <li><a href=""><i class="msg"> </i> </a></li>
				 <div class="clearfix"> </div>
			   </ul>
			   <h3 class="m_3">Subscribe</h3>
			   <p class="m_4">aliquam erat volutpat. Ut wisi</p>
			   <div class="footer_search">
			    <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
			    <input type="submit" value="Search">
			   </div>
		   </div>
		   <div class="footer-grid footer-grid_last">
	          <ul class="secure">
			  	<li class="secure_img"><img src="images/secure.png" alt=""/></li>
			  	<li class="secure_desc">Lorem ipsum dolor coadipiscing</li>
			  	<div class="clearfix"> </div>
			  </ul>
			  <ul class="secure">
			  	<li class="secure_img"><img src="images/order.png" alt=""/></li>
			  	<li class="secure_desc">Lorem ipsum dolor coadipiscing</li>
			  	<div class="clearfix"> </div>
			 </ul>
		   </div>
		   <div class="clearfix"> </div>
		   <div class="copy">
		    <p>Copyright &copy; 2014.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
		</div>
	   </div>
	</div>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>


@endsection
