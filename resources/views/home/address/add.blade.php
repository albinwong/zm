@extends('layout.home')
@section('content')
<section id="content">
	<div class="content-wrap" style="padding:20px;">
		<div class="container clearfix">

		<!-- 左侧菜单 start -->
			<div class="col-md-3">
				<div class="list-group">
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
			<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
            <div class="col_full">
                <label for="login-form-username">姓名:</label>
                <input id="login-form-username" name="name" value="" class="form-control" type="text">
            </div>

            <div class="col_full">
                <label for="login-form-password">联系电话:</label>
                <input id="login-form-password" name="number" value="" class="form-control" type="text">
            </div>
			<div class="col_full">
                <label for="login-form-password">地址:</label>
                <div>
                <select name="" id="" class="form-control col-md-3" style="width:30%;margin-right:5px;"></select>
                <select name="" id="" class="form-control col-md-3" style="width:30%;margin-right:5px;"></select>
                <select name="" id="" class="form-control col-md-3" style="width:30%;margin-right:5px;"></select>
                </div>
            </div>
            <div class="col_full">
                <label for="login-form-password">详细地址:</label>
                <textarea class="form-control" name="" id="" cols="10" rows="5"></textarea>	
                
            </div>
            <div class="col_full nobottommargin">
            {{csrf_field()}}
                <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">添加</button>
                
            </div>

        </form>
		</div>
		<!-- 右侧菜单 end -->

		</div>
	</div>
</section>
@endsection