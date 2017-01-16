@extends('layout.home')
@section('title','商品搜索')
@section('lun')
@endsection
@section('content_right')
<div class="col-md-9" style="padding-top:10px;"> 
	<!-- 商品列表 start -->
    <div class="row content_bottom"> 
    	@foreach($goods as $k=>$v)
    	@if($v->status != 0)
	   	   <div class="col-md-3">
	   	   	<div class="content_box"  style="margin-bottom:20px;">
	   	   		
	   	   	  	<div class="view view-fifth">
		   	   	  	<a href="/{{$v->id}}.html">
		   	   	     	<img src="{{$v->path}}" style="width:200px;height:140px;" class="img-responsive" alt=""> 
		   	   	    </a>	
			   	   	<div class="content_box-grid">
			   	   	  	<a href="/{{$v->id}}.html"><p class="m_1">{{$v->name}}</p></a>
			   	   	  	<div class="price">价格￥:
					    	<span class="actual">{{$v->price}}</span>
					  	</div>
						<ul class="product_but">
						 	<a href="/{{$v->id}}.html"><li class="but3">加入购物车</li></a>
						  	<li> <span class="glyphicon glyphicon-hand-right col-xs-2" style="color:red">:{{$v->sold}}</span><span> </span></li>
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
<div class="clearfix"></div>
   <div id="pages" class="pull-right">
		{!! $goods->appends($request->all())->render() !!}
	</div>
</div>
				
</div>
</div>
</div>
</div>
</div> 
<!-- <div class="clearfix"> </div> -->
@endsection


