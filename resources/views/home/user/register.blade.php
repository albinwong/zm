@extends('layout.home')
@section('title','用户注册')
@section('header')
@show
@section('content')
<style type="text/css">
.main {
    background:url("/homes/images/reg_bg.jpg") no-repeat;
}
.form-control{
    width:500px;
    /*margin:0 auto;*/
}
.nobottommargin{
    margin-left:100px;
}
.col_small{
    width:150px;
    margin:0px 0px 0px 0px;
}
.h3{
    font-weight:bold;
    margin:0 auto;
}
</style>
    <div class="main">
		<div class="container">
		  <div class="panel-body" style="padding: 40px;">
    		<form class="nobottommargin" action="/doregister" method="post">
                <div class="col_small">
                    <h3>注册</h3>
                </div>
                

                <div class="col_small">
                    用户名:<input id="login-form-username" name="username" class="form-control" type="text">
                </div>

                <div class="col_small">
                    <label for="login-form-password">邮箱:</label>
                    <input id="login-form-password" name="email" class="form-control" type="email">
                </div>


                <div class="col_small">
                    <label for="login-form-password">密码:</label>
                    <input id="login-form-password" name="password" class="form-control" type="password">
                </div>
                <div class="col_small">
                    <label for="login-form-password">确认密码:</label>
                    <input id="login-form-password" name="repassword" class="form-control" type="password">
                </div>
                <div class="col_small">
                    <label for="login-form-password">验证码:</label>
                    <input id="login-form-password" name="repassword" class="form-control" type="password">
                </div>
                {{csrf_field()}}
                <div class="col_small">
                    <button>注册</button>
                </div>
                
            </form>
    	</div>
	  </div>
	</div>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>

@endsection

<!-- @section('footer')
@endsection -->