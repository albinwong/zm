@extends('layout.home')
@section('header')
@show
@section('content')
<style type="text/css">
.main {
    background:url("/homes/images/reg_bg.jpg") no-repeat;
}

</style>
    <div class="main">
		<div class="container">
		  <div class="panel-body" style="padding: 40px;">
    		<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

                <h3>Login to your Account</h3>

                <div class="col_full">
                    <label for="login-form-username">Username:</label>
                    <input id="login-form-username" name="login-form-username" value="" class="form-control" type="text">
                </div>

                <div class="col_full">
                    <label for="login-form-password">Password:</label>
                    <input id="login-form-password" name="login-form-password" value="" class="form-control" type="password">
                </div>

                <div class="col_full nobottommargin">
                    <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                    <a href="#" class="fright">Forgot Password?</a>
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