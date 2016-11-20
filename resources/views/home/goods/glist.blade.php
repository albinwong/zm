@extends('layout.home')

@section('content')
			<div class="col-md-12"  >
				<ol class="breadcrumb">
					<li><span class="glyphicon glyphicon-tags"></span></li>
					@foreach($cate as $k=>$v)
					   <li><a href="#">{{$v->name}}</a></li>
					@endforeach
				</ol>
		    </div><br><br>
    	    <div class="row content_bottom"> 
    	    	@foreach($goods as $k=>$v)
    	    	@if($v->status != 0)
			   	   <div class="col-md-3">
			   	   	<div class="content_box">
			   	   		
			   	   	  	<div class="view view-fifth">
				   	   	  	<a href="/detail?id={{$v->id}}">
				   	   	     	<img src="/homes/images/p1.jpg" class="img-responsive" alt=""> 
				   	   	    </a>	
					   	   	<div class="content_box-grid">
					   	   	  	<a href="/detail?id={{$v->id}}"><p class="m_1">{{$v->name}}</p></a>
					   	   	  	<div class="price">价格￥:
							    	<span class="actual">{{$v->price}}</span>
							  	</div>
								<ul class="product_but">
								 	<a href="#"><li class="but3">加入购物车</li></a>
								  	<li> <span class="glyphicon glyphicon-hand-right col-xs-2" style="color:red">:{{$v->buy}}</span><span> </span></li>
								  	<div class="clearfix"> </div>
								</ul>
							   	<div class="mask">
		                         	<div class="info">Quick View</div>
				               	</div>
				            </div>
				   	   	</div>
			   	   	  </div>
			   	   </div>
			   	   @endif
			   	@endforeach
			</div>
				
	    </div>
	  </div>
	 </div>
	</div>
    
	@endsection


