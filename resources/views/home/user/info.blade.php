@extends('layout.home')
@section('title','查看个人信息')
@section('content')
<section id="content">

	<div class="content-wrap" style="padding:20px;">
		<div class="container clearfix">

		<!-- 左侧菜单 start -->
			<div class="col-md-3">
				<div class="list-group">
					<a href="/selfuser/info" class="list-group-item active">
						查看个人信息
					</a>
					<a href="/selfuser/edit" class="list-group-item">
						修改个人信息
					</a>
                    <a href="/order/index" class="list-group-item">
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
			<form id="register-form" name="register-form" class="nobottommargin" action="/address/insert" method="post">
            <div class="col_full">
                <label for="register-form-name">用户名:</label>
                <input id="login-form-name" name="email" value="{{$userinfo->username}}" class="form-control" type="text" readonly>
            </div> 
            <div class="col_full">
                <label for="register-form-password">头像:</label>
                <div>
                <img src="{{$userinfo->profile}}" alt="" style = "width:100px">
               </div>
            </div>
            <div class="col_full">
                <label for="register-form-name">邮箱:</label>
                <input id="login-form-name" name="email" value="{{$userinfo->email}}" class="form-control" type="text" readonly>
            </div> 

            <div class="col_full">
                <label for="register-form-password">联系电话:</label>
                <input id="register-form-password" name="phone" value="{{$userinfo->phone}}" class="form-control" type="text"readonly>
            </div>
			
<!--             <div class="col_full">
                <label for="register-form-password">地址:</label>
                <div>
                <select name="sheng" id="prov" class="form-control col-md-3" style="width:30%;margin-right:5px;">
                	<option value=""></option>
                </select>
                <select name="shi" id="city" class="form-control col-md-3" style="width:30%;margin-right:5px;">
                	<option value=""></option>
                </select>
                <select name="xian" id="xian" class="form-control col-md-3" style="width:30%;margin-right:5px;">
                	<option value=""></option>
                </select>
                </div>
            </div>
            <div class="col_full">
                <label for="register-form-password">详细地址:</label>
                <textarea class="form-control" name="detail" id="" cols="10" rows="5">
                	
                </textarea>
            </div> -->
            <div class="col_full nobottommargin">
            {{csrf_field()}}
                <!-- <button class="button button-3d button-black nomargin" id="register-form-submit" value="login">添加</button> -->
                
            </div>

        </form>
		</div>
		<!-- 右侧菜单 end -->

		</div>
	</div>
</section>
@endsection