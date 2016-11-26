@extends('layout.home')
@section('content')

<div class="container clearfix">
	<div class="col-md-12" style="height:80px;background:#f3f3f3;border:1px solid #e9e9e9;">
		<div class="col-md-3 col-md-offset-1" style="padding-top:15px;"><a href="/">首页</a> / 购物车</div>
	</div>
</div>
<div class="container clearfix">
	<table class="table cart" style="margin-top:50px;">
		<thead>
			<tr>
				<th class="cart-product-remove">&nbsp;</th>
				<th class="all">全选<input type="checkbox"></th>
				<th class="cart-product-thumbnail">图片</th>
				<th class="cart-product-name">名称</th>
				<th class="cart-product-price">价格</th>
				<th class="cart-product-quantity">数量</th>
				<th class="cart-product-subtotal">小计</th>
			</tr>
		</thead>
		<form action="/order/add" method="post">
			<tbody>

			@if(!empty($carts))
				@foreach($carts as $k=>$v)
				<tr class="cart_item">
					<td class="cart-product-remove">
						<a href="#" class="remove" title="Remove this item"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
					<td class="cart-product-remove">
						<input type="checkbox" name="data[{{$v['goods_id']}}][id]"  vlaue="{{$v['goods_id']}}">
					</td>

					<td class="cart-product-thumbnail">
						<a href="#"><img width="64" height="64" src="{{$v['img']->path}}" alt="Checked Canvas Shoes" width="64" height="64"></a>
					</td>

					<td class="cart-product-name">
						<a href="/{{$v['goods_id']}}.html">{{$v['info']->name}}</a>
					</td>

					<td class="cart-product-price">
						<span class="amount">￥{{$v['info']->price}}</span>
					</td>

					<td class="cart-product-quantity">
						<div class="quantity clearfix">
							<input value="-" class="minus" type="button">
							<input name="num" style="width:20px;text-align:center;" value="{{$v['num']}}" class="qty" type="text">
							<input value="+" class="plus" type="button">
							<input type="hidden" name="data[{{$v['goods_id']}}][kouwei]" value="{{$v['kouwei']}}">
						</div>
					</td>

					<td class="cart-product-subtotal">
					<span class="amount">￥{{$v['num'] * $v['info']->price}}</span>
					</td>
				</tr>
				@endforeach

				<script type="text/javascript">
	        	//全选
	        	$('.all').click(function(){
	        		if($('.single').attr('checked')!='checked'){
	        			$('.single').attr('checked','checked');
	        		}else{
	        			$('.single').removeAttr('checked');
	        		}
	        	});
	        	//加减数量
	                var q = $('.qty');
	                q.keyup(function(event){
	                    if($(this).val()==''){
	                        $(this).val(1);
	                    }
	                   var  reg = /^\d+$/;
	                    if(!reg.test($(this).val())){
	                        $(this).val(1);
	                    }
	                }); 
	                $('.minus').click(function(){
	                    var q = $(this).parent().find('.qty');
	                    q.val(q.val()-1);
	                    if(q.val()<1){
	                        q.val(1);
	                    }
	                    q.parent().parent().parent().parent().find('.xiaoji').html('￥'+q.val()*{{$v['info']->price}});
	                });
	                $('.plus').click(function(){
	                    var q = $(this).parent().find('.qty');
	                    q.val(Number(q.val())+1);
	                    q.parent().parent().parent().parent().find('.xiaoji').html('￥'+q.val()*{{$v['info']->price}});
	                })
	                //删除
	                $('.remove').click(function(){
	                	var id = $(this).parent().parent().find('.single').val();
	                	// alert(id);
	                	$.get('/cart/delete',{'id':id},function(data){
	                		console.log(data);
	                	});
	                	 $(this).parent().parent().remove();
	                })
				</script>
       
				<tr class="cart_item">
					<td colspan="6">
						<div class="row clearfix">
							<div class="col-md-4 col-xs-4 nopadding">
								
							</div>
							<div class="col-md-8 col-xs-8 nopadding">
								{{csrf_field()}}
								<button href="#" class="button button-3d nomargin fright">提交订单</button>
								<a href="/" class="button button-3d notopmargin fright">继续购物</a>
							</div>
						</div>
					</td>
				</tr>
			@else
				<tr class="cart_item">
					<td colspan="7" class="text-center" style="font-size:18px;padding-top:80px;">您的购物车空空的,快去<a href="/">添加</a>吧!!!</td>
				</tr>
			@endif
			</tbody>
		</form>
	</table>
</div>
@endsection