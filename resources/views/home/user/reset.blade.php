@extends('layout.home')
@section('content')
<style type="text/css">
	.form_mod{
		padding:10px 0px;
	}
	.form_list{
		margin:50px 10px 20px 40%;
	}
	.item{
		padding-top:20px;
	}
	input[type=password]{
		border:solid 1px black;
	}
	button{
		letter-spacing: 0px;
		font-size:18px !important;
	}
	h2{
		margin-left:30%;
		padding:20px;
		font-size:18px;
		margin-top:2%;
		margin-bottom:-5%;
	}
</style>
<div class="form_mod">
    <form action="/reset" method="post">
	<h2 class="btn-group btn-group-lg label-warning">重置密码</h2>
        <ul class="form_list">
            <li class="item">
                <span class="tit">新&ensp;密&ensp;码：</span>
                <input name="password" placeholder="请输入新密码" type="password"><span></span>
            </li>
            <li class="item">
                <span class="tit">确认新密码</span>
    				<input class="fInput w93" placeholder="请再次输入密码" name="repassword" type="password"><span></span>
            </li>
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$res->id}}">
            <li class="item">
                <div class="btn_mod col-sm-3 col-md-offset-1">
                    <button>确认修改</button>
                </div>	
            </li>
        </ul>
    </form>
</div>
<div class="clearfix" style="padding:20px"></div>
<script>  
  function re_captcha() {
    $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('codeImg').src=$url;
  }
</script>
@endsection