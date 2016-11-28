@extends('layout.home')
@section('title','找回密码')
@section('content')
<style type="text/css">
	.form_mod{
		padding:10px 0px;
		background:;
	}
	.form_list{
		margin:50px 10px 20px 40%;
	}
	.item{
		padding-top:20px;
	}
	button{
		letter-spacing: 0px;
		font-size:18px;
	}
</style>
<div class="form_mod">
    <form action="/forget" method="post">
        <ul class="form_list">
            <li class="item">
                <span class="tit">邮&emsp;箱：</span>
                <input name="email" placeholder="请输入邮箱全名" type="text">
            </li>
            <li class="item">
                <span class="tit">验证码：</span>
    				<input class="fInput w93" placeholder="请输入验证码" name="code" type="text">
    				<a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新验证码" width="100" height="35" id="codeImg" border="0"></a><span></span>
            </li>
            {{csrf_field()}}
            <li class="item">
                <div class="btn_mod col-sm-3">
                    <button>立即验证</button>
                </div>	
            </li>
        </ul>
    </form>
</div>
<div class="clearfix"></div>
<script>  
  function re_captcha() {
    $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('codeImg').src=$url;
  }
</script>
@endsection