@extends('layout.home')

@section('content')



<div class="col-md-9">
   <div class="single_image">
	     <ul id="etalage" class="etalage" style="display: block; width: 314px; height: 552px;">
			<li class="etalage_thumb thumb_1 etalage_thumb_active" style="display: list-item; background-image: none; opacity: 1;">
				<a href="optionallink.html">
					<img class="etalage_thumb_image" src="images/s1.jpg" style="display: inline; width: 300px; height: 400px; opacity: 1;">
					<img class="etalage_source_image" src="images/s1.jpg" alt="">
				</a>
			</li>
			<li class="etalage_thumb thumb_2" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="images/s2.jpg" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="images/s2.jpg" alt="">
			</li>
			<li class="etalage_thumb thumb_3" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="images/s3.jpg" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="images/s3.jpg" alt="">
			</li>
			<li class="etalage_thumb thumb_4" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="images/s1.jpg" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="images/s1.jpg" alt="">
			</li>
			<li class="etalage_thumb thumb_5" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="images/s2.jpg" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="images/s2.jpg" alt="">
			</li>
			<li class="etalage_thumb thumb_6" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="images/s3.jpg" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="images/s3.jpg" alt="">
			</li>
			<li class="etalage_thumb thumb_7" style="background-image: none; display: none; opacity: 0;">
				<img class="etalage_thumb_image" src="images/s1.jpg" style="display: inline; width: 300px; height: 400px; opacity: 1;">
				<img class="etalage_source_image" src="images/s1.jpg" alt="">
			</li>
		<li class="etalage_magnifier" style="margin: 0px; padding: 0px; display: none; left: 18px; top: 6px; opacity: 1;"><div style="margin: 0px; padding: 0px; width: 195px; height: 179px;"><img style="margin: 0px; padding: 0px; width: 300px; height: 400px; display: inline; left: -12px; top: 0px;" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s1.jpg"></div></li><li class="etalage_icon" style="display: list-item; top: 290px; left: 20px; opacity: 1;">&nbsp;</li><li class="etalage_hint" style="display: none; margin: 0px; top: -15px; right: -15px;">&nbsp;</li><li class="etalage_zoom_area" style="margin: 0px; left: 324px; display: none; background-image: none; opacity: 0;"><div class="etalage_description" style="width: 546px; bottom: 6px; left: 6px; opacity: 0.7; display: none;"></div><div style="width: 586px; height: 538px;"><img class="etalage_zoom_img" style="width: 900px; height: 1200px; left: -224.317px; top: -43.6355px;" src="images/s1.jpg"></div></li><li class="etalage_small_thumbs" style="width: 314px; top: 424px;"><ul style="width: 1072px;"><li class="etalage_smallthumb_navtoend etalage_smallthumb_first" style="margin: 0px 10px 0px 0px; opacity: 0.4; left: 0px;"><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s1.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 1; left: 0px;" class="etalage_smallthumb_active"><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s1.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: 0px;" class="etalage_smallthumb_last"><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s2.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: 0px;" class=""><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s3.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: 0px;" class=""><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s1.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: 0px;" class=""><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s2.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: 0px;" class=""><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s3.jpg" style="width: 90px; height: 120px;" width="90"></li><li style="margin: 0px 10px 0px 0px; opacity: 0.4; left: 0px;" class=""><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s1.jpg" style="width: 90px; height: 120px;" width="90"></li><li class="etalage_smallthumb_navtostart" style="margin: 0px 10px 0px 0px; opacity: 0.4; left: 0px;"><img class="etalage_small_thumb" src="file:///F:/xampp/htdocs/%E4%BA%8C%E6%9C%9F%E9%A1%B9%E7%9B%AE/chahua3379/images/s1.jpg" style="width: 90px; height: 120px;" width="90"></li></ul></li></ul>
	    </div>
	    <div class="single_right">
        	<h3>hendrerit in vulputate velit </h3>
        	<p class="m_5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse</p>
        	<div class="price_single">
			  <span class="reducedfrom">$66.00</span>
			  <span class="actual1">$12.00</span><a href="#">click for offer</a>
			</div>
        	
			<div class="btn_form">
			   <form>
				 <input value="buy now" title="" type="submit">
			  </form>
			</div>
			<ul class="add-to-links">
              <li><img src="images/wish.png" alt=""><a href="#">Add to wishlist</a></li>
            </ul>
			<div class="col-xs-12  col-sm-6  col-md-4">
              <div class="banners--small  banners--small--social">
                <a href="#" class="social"><i class="zocial-facebook"> </i>
                <span class="banners--small--text"> Share on<br>Facebook</span>
                <div class="clearfix"> </div>
                </a>
              </div>
			</div>
            <div class="col-xs-12  col-sm-6  col-md-4">
              <div class="banners--small  banners--small--social">
                <a href="#" class="social"><i class="zocial-twitter"> </i>
                <span class="banners--small--text"> Tweet it<br>Twitter</span>
                <div class="clearfix"> </div>
                </a>
              </div>
			</div>
            <div class="col-xs-12  col-sm-6  col-md-4">
              <div class="banners--small  banners--small--social">
                <a href="#" class="social"><i class="zocial-pin"> </i>
                <span class="banners--small--text">Pin on<br>Pinterest</span>
                <div class="clearfix"> </div>
                </a>
              </div>
		   </div>
           </div>
		   <div class="clearfix"> </div>
		   <!----product-rewies---->
			<div class="product-reviwes">
				<!--vertical Tabs-script-->
				<!---responsive-tabs---->
					<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
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
				<!---//responsive-tabs---->
				<!--//vertical Tabs-script-->
				<!--vertical Tabs-->
        		<div id="verticalTab" style="display: block; width: 100%; margin: 0px;" class="resp-vtabs">
		            <ul class="resp-tabs-list">
		                <li class="resp-tab-item" aria-controls="tab_item-0" role="tab">Description</li>
		                <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">Product tags</li>
		                <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-2" role="tab">Product reviews</li>
		            </ul>
		            <div class="resp-tabs-container vertical-tabs">
		                <h2 class="resp-accordion" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Description</h2><div class="resp-tab-content" aria-labelledby="tab_item-0">
		                	<h3> Details</h3>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
		               		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor</p>
		                </div>
		                <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Product tags</h2><div class="resp-tab-content" aria-labelledby="tab_item-1">
		                	<h3>Product Tags</h3>
		                	<h4>Add Your Tags:</h4>
		                	<form>
		                		<input type="text"> <input value="ADD TAGS" type="submit">
		                		<span>Use spaces to separate tags. Use single quotes (') for phrases.</span>
		                	</form>
		                </div>
		                <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>Product reviews</h2><div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-2" style="display:block">
		                	<h3>Customer Reviews</h3>
		                	<p>There are no customer reviews yet.</p>
		                </div>
		            </div>
       		     </div>
       		     <div class="clearfix"> </div>
		      </div>
		      <div class="related_products">
		      	<h3>Related Products</h3>
		      	<div class="row">
		      		<div class="col-md-4 related">
		      			<img src="images/pic4.jpg" class="img-responsive" alt="">
		      		</div>
		      		<div class="col-md-4 related">
		      			<img src="images/pic5.jpg" class="img-responsive" alt="">
		      		</div>
		      		<div class="col-md-4">
		      			<img src="images/pic6.jpg" class="img-responsive" alt="">
		      		</div>
		      	</div>
		      </div>
		   </div>




@endsection