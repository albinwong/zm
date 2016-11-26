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
    <ul class="form_list">
        <li class="item">
            <span class="tit">登录名：</span>
            <input id="username" class="" value="" placeholder="请输入邮箱全名" type="text">
        </li>
        <li class="item">
            <span class="tit">验证码：</span>
				<input class="fInput w93" value="" placeholder="" id="code" type="text">
				<a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="35" id="codeImg" border="0"></a><span></span>
				<a id="change_code" href="javascript:void(0);" class="form_prompt">换一换</a>
                <span class="hid" id="codespan"><i class="W_icon icon_succ" id="codep"></i><i id="codemsg"></i></span>
        </li>
        <li class="item">
            <div class="btn_mod col-sm-3">
                <button>立即验证</button>
            </div>	
        </li>
    </ul>
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