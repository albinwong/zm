@extends('layout.home')
@section('title','个人中心')
@section('content')
<section id="content">
	<div class="content-wrap" style="padding:20px;">
		<div class="container clearfix">

		<!-- 左侧菜单 start -->
			<div class="col-md-3">
				<div class="list-group">
					<a href="#" class="list-group-item">
						修改个人信息
					</a>
					<a href="/order/index" class="list-group-item">
						订单
					</a>
					<a href="#" class="list-group-item active">
						收货地址
					</a>
					<a href="#" class="list-group-item">
						收藏
					</a>
					<a href="#" class="list-group-item">
						浏览历史
					</a>
					
				</div>
			</div> 
		<!-- 左侧菜单 end -->
		<!-- 右侧菜单 start -->
		<div class="col-md-5 col-md-offset-2">
			<form id="register-form" name="register-form" class="nobottommargin" action="/address/insert" method="post">
            <div class="col_full">
                <label for="register-form-name">姓名:</label>
                <input id="login-form-name" name="name" value="" class="form-control" type="text">
            </div> 

            <div class="col_full">
                <label for="register-form-password">联系电话:</label>
                <input id="register-form-password" name="number" value="" class="form-control" type="text">
            </div>
			<div class="col_full">
                <label for="register-form-password">地址:</label>
                <div>
                <select name="sheng" id="prov" class="form-control col-md-3" style="width:30%;margin-right:5px;"></select>
                <select name="shi" id="city" class="form-control col-md-3" style="width:30%;margin-right:5px;"></select>
                <select name="xian" id="xian" class="form-control col-md-3" style="width:30%;margin-right:5px;"></select>
                </div>
            </div>
            <div class="col_full">
                <label for="register-form-password">详细地址:</label>
                <textarea class="form-control" name="detail" id="" cols="10" rows="5"></textarea>	
                
            </div>
            <div class="col_full">
                <label for="register-form-password">是否默认<input type="checkbox" name="isdefault" value="1"></label>
                
            </div>
            <div class="col_full nobottommargin">
            {{csrf_field()}}
                <button class="button button-3d button-black nomargin" id="register-form-submit" value="login">添加</button>
                
            </div>

        </form>
		</div>
		<!-- 右侧菜单 end -->
		<script type="text/javascript">
		$(function(){
			// 获取省份的信息
			
			
			$.get('/address/get',{'pid':0},function(data){
				// 遍历数据进行添加
				for(var i=0;i<data.length;i++){
				var op = $('<option value="'+data[i].areaid+'">'+data[i].areaname+'</option>')
				$('#prov').append(op);
				}
			},'json');
			$('#prov').change(function(){
				// 获取当前省的id
				var pid = $(this).val();
				// 通过省的id去获取市的内容
				$.get('/address/get',{'pid':pid},function(data){
					$('city').empty();
					// 遍历数据进行添加
				for(var i=0;i<data.length;i++){
				var op = $('<option value="'+data[i].areaid+'">'+data[i].areaname+'</option>')
				$('#city').append(op);
				}
			},'json');
				
			});
			$('#city').change(function(){
				// 获取当前省的id
				var pid = $(this).val();
				// 通过省的id去获取市的内容
				$.get('/address/get',{'pid':pid},function(data){
					$('#xian').empty();
					// 遍历数据进行添加
				for(var i=0;i<data.length;i++){
				var op = $('<option value="'+data[i].areaid+'">'+data[i].areaname+'</option>')
				$('#xian').append(op);
				}
			},'json');
				
			});

		})
		</script>

		</div>
	</div>
</section>
@endsection