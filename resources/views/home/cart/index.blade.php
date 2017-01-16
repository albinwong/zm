@extends('layout.home')
@section('content')
<style type="text/css">
	a:hover{
		text-decoration: none;
	}
	.shop a{
		color:white;
	}
	.spinner{
		display: block;
	    overflow: hidden;
	    width: 100px;
	}
	
	.spinner a{
		background-color: #f7f7f7;
	    border: 1px solid #d9d9d9;
	    cursor: pointer;
	    display: inline-block;
	    float: left;
	    height: 25px;
	    outline: 0 none;
	    width: 25px;
	    text-align: center;
	}
	.spinner .qty{
		 border-color: #d9d9d9;
	    border-style: solid;
	    border-width: 1px 0;
	    color: #565656;
	    float: left;
	    height: 25px;
	    line-height: 25px;
	    outline: 0 none;
	    text-align: center;
	    width: 45px;
	}
	.zong{
		border:solid 1px #ddd;
	}
	.total{
		color: red;
		font-size: 20px;
	}
</style>
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
<<<<<<< HEAD
				<th class="all">全选<input type="checkbox"  id="chkAll" value="goods_id[]"></th>
=======
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
				<th class="cart-product-thumbnail">图片</th>
				<th class="cart-product-name">名称</th>
				<th class="cart-product-price">价格</th>
				<th class="cart-product-quantity">数量</th>
				<th class="cart-product-subtotal">小计</th>
			</tr>
		</thead>
		<form action="/order/confirm" method="get">
			<tbody>

			@if(!empty($carts))
				@foreach($carts as $k=> $v)
				<tr class="cart_item">
					<td class="cart-product-remove">
						<li class="remove" title="Remove this item"><i class="glyphicon glyphicon-trash"></i></li>
<<<<<<< HEAD
					</td>
					<td class="cart-product-remove">
						<input type="checkbox" name="data[{{$v['goods_id']}}][id]"  value="{{$v['goods_id']}}" class="single">
=======
<<<<<<< HEAD
					</td>
					<td class="cart-product-remove">
						<input type="checkbox" name="data[{{$v['goods_id']}}][id]"  value="{{$v['goods_id']}}" class="single">
=======
>>>>>>> dacfa8dd5aa50ff2cfb31b5437c15193c8ef0fb5
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
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
						<div class="quantity clearfix spinner">
							<a class="minus"><b>-</b></a>
							<input name="data[{{$v['goods_id']}}][num]"  value="{{$v['num']}}" class="qty" type="text">
							<a  class="plus"><b>+</b></a>
						</div>
					</td>

					<td class="cart-product-subtotal">
<<<<<<< HEAD
						<input type="hidden" name="data[{{$v['goods_id']}}][id]"  value="{{$v['goods_id']}}">
=======
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
						<input type="hidden" name="data[{{$v['goods_id']}}][kouwei]" value="{{$v['kouwei']}}">
						<span class="xiaoji">￥{{$v['num']*$v['info']->price}}</span>
					</td>
				</tr>
				@endforeach

				<script type="text/javascript">
	        
	        	//全选
<<<<<<< HEAD
			    var num = 1;
			    $('#chkAll').click(function(){
			    	if(num % 2 ==1){
			    		$('input').attr('checked',true);
			    	}else{
			    		$('input').attr('checked',false);
			    	}
			    	num++;
			    });
=======
	            $('.all').click(function(){
	                if($(this).attr('checked')=='checked'){
	                    $('.single').attr('checked','checked');
	                }else{
	                    $('.single').removeAttr('checked');
	                }
	            });

	        	
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
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
	                    aa = q.parent().parent().parent().find('.amount').html();
	                    bb = aa.substr(1);
	                    q.parent().parent().parent().find('.xiaoji').html('￥'+q.val()*Number(bb));
	                    
	                });
	                $('.plus').click(function(){
	                    var q = $(this).parent().find('.qty');
	                    q.val(Number(q.val())+1);
	                	aa = q.parent().parent().parent().find('.amount').html();
	                    bb = aa.substr(1);
	                    q.parent().parent().parent().find('.xiaoji').html('￥'+q.val()*Number(bb));

<<<<<<< HEAD
	                });
	                    
=======
<<<<<<< HEAD
	                });
	                    
=======
	                })
	                    

>>>>>>> dacfa8dd5aa50ff2cfb31b5437c15193c8ef0fb5
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
	                //删除
	                $('.remove').click(function(){
	                	var id = $(this).parent().parent().find('.single').val();
	                	//alert(id);
	                	$.get('/cart/delete',{'id':id},function(data){
	                		// console.log(data);
	                		// alert(data);
	                	});
	                	 $(this).parent().parent().remove();
	                })
				</script>
<<<<<<< HEAD
=======
       			<tr class="cart_item zong">
       				<td colspan='8'>
       					<div class="col-md-2 col-md-offset-8">
       						总价(不含运费):    
       					</div>
       					<div class="col-md-2 total">
       						  ￥ 
       					</div>
       				</td>
       			</tr>
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
				<tr class="cart_item">
					<td colspan="8">
						<div class="row clearfix">
							<div class="col-md-3 col-xs-3 nopadding col-md-offset-9">
								{{csrf_field()}}
                				<div class="col-md-4 btn btn-primary shop"><a href="/glist">继续购物</a></div>
								<div class="col-md-3"><input value="提交订单" class="btn btn-danger" type="submit"></div>
							</div>
						</div>
					</td>
				</tr>
			@else
				<tr class="cart_item">
					<td colspan="7" class="text-center" style="font-size:18px;padding-top:80px;">您的购物车空空的,快去<a href="/glist">添加</a>吧!!!</td>
				</tr>
			@endif
			</tbody>
		</form>
	</table>
</div>
@endsection