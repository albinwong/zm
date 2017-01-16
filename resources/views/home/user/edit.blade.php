@extends('layout.home')
@section('title','修改个人信息')
@section('content')
<section id="content">

	<div class="content-wrap" style="padding:20px;">
		<div class="container clearfix">

		<!-- 左侧菜单 start -->
			<div class="col-md-3">
				<div class="list-group">
					<a href="/selfuser/info" class="list-group-item">
						查看个人信息
					</a>
					<a href="/selfuser/edit" class="list-group-item active">
						修改个人信息
					</a>
                    <a href="/order" class="list-group-item">
                        订单
                    </a>
                    <a href="/address/add" class="list-group-item">
                        收货地址
                    </a>
				</div>
			</div>
		<!-- 左侧菜单 end -->
		<!-- 右侧菜单 start -->
		<div class="col-md-5 col-md-offset-2">
			<form id="register-form" name="register-form" class="nobottommargin" action="/selfuser/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name ="id" value="{{$useredit->id}}">
            <div class="col_full">
                <label for="register-form-name">用户名:</label>
                <input id="login-form-name" name="email" title="不能修改用户名" value="{{$useredit->username}}" class="form-control" type="text" readonly>
            </div>
            <div class="col_full">
                <label for="register-form-password">头像:</label>
                <div>
                	<img src="{{$useredit->profile}}" alt="" style = "width:100px">
                	<input class="small" type="file" name="profile">
               </div>
            <div class="col_full">
                <label for="register-form-name">邮箱:</label>
                <input id="login-form-name" name="email" value="{{$useredit->email}}" class="form-control" type="text">
            </div> 

            <div class="col_full">
                <label for="register-form-password">联系电话:</label>
                <input id="register-form-password" name="phone" value="{{$useredit->phone}}" class="form-control" type="text">
            </div>

           
            
            <div class="col_full nobottommargin">
            {{csrf_field()}}<br>
                <button class="button button-3d button-black nomargin" id="register-form-submit" value="login">确认修改</button>
                
            </div>

        </form>
		</div>
		<!-- 右侧菜单 end -->

		</div>
	</div>
</section>
@endsection