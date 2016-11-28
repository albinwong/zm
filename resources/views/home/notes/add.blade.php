@extends('layout.home')
@section('title','添加留言')
@section('content')
<style type="text/css">
.main {
  background: url("/homes/images/body_bg.jpg") ;
  background-repeat:repeat;
  font-size:18px;
  list-style: outside none none;
  margin: 0 auto;
  padding: 10px;
  width: 100%;
}
#detail {
    background-image: url("/homes/images/msg_back01.gif");
    background-position: left top;
    background-repeat: repeat;
    color: #336699;
    font-size: 16px;
    letter-spacing: 1pt;
    line-height: 18px;
    text-decoration: none;
    text-indent: 28px;
}
label{
	padding-top:20px;
}
select{
	width:130px;
	margin:0 auto;
	text-align:center;
}
</style>
<div class="main">
<div class="col-md-10 col-md-offset-1" style="padding-top:20px">
  <div class="col-md-12">
	  <div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><strong>留言须知:</strong></div>
		  <div class="panel-body">
			<p>
			&emsp;为了能及时处理并回复您的网上留言，请您尽可能地选择对应的留言类型。为了便于以后与您取得联系并为您提供进一步的服务，请尽可能留下您的姓名与联系方式。<br>
			&emsp;&emsp;1、请将您需要向我单位反映的问题（咨询问题或投诉意见）如实填写，我们将会认真核实、调查，并按照相关法律、法规、文件在15日之内以电话或E-mail的方式给您做出答复。<br/>
			&emsp;&emsp;2、为了及时与您取得联系，向您反馈情况，征求您对反馈情况的意见,请您在真实姓名和联系方式栏中如实填写真实资料，我们承诺会对您的个人资料严格保密。<br/>
			&emsp;&emsp;3、一切诋毁社会主义、损害国家形象、恶意抨击国家机关以及影响互联网安全、文明的留言一律不予回复，并依法报送司法机关处理。</p>
		  </div>
		  <p class="col-md-offset-9 text-center">
		  	追梦在线订餐网 管理组<br>
			2016-11-27
		  </p>
	  </div>
	  <strong>✚添加留言</strong>
  </div>
	<form action="/notes/add" method="post" style="padding-top:20px;">
		<div class="col-md-12">
			<div class="col-md-4">
				<label>昵称:</label>
				<input type='text' name='author' placeholder="请输入您的昵称">
			</div>
		    <div class="col-md-4">
			    <label>E-mail: </label>
			    <input type='email' name='email' placeholder="请输入您的邮箱">
			</div>
		    <div class="col-md-4">
				<label>联系电话:</label>
				<input type='text' name='tel' style="width:200px" placeholder="请输入您的电话">
			</div>
			<div class="col-md-4">
		    <label>留言类型:</label>
			    <select name="type" >
					<option value="0">咨询</option>
					<option value="1">投诉</option>
					<option value="2">建议</option>
					<option value="3">意见</option>
				</select>
			</div>
			<div class="col-md-4">
				<label>留言标题: </label>
				<input type='text' name='title'>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-8">
		    <label>留言内容: </label>
		    <br><textarea id="detail" name="content" cols="98" rows="10"></textarea>
		    </div>
		    <div class="clearfix"></div>
	    <div class="col-md-6"><br>
	    <label>验证码: </label>
	    <input  type="text" name="code" placeholder="请输入右侧验证码信息"><a onclick="javascript:re_captcha();"><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="codeImg" border="0"></a><span></span>
	    </div>
	    {{csrf_field()}}
	    </div><div class="col-md-6">
    		<div class="col-md-6"><button>提交</button></div>
    		<!-- <div class="col-md-6"><button class="btn-warning" type="reset">重置</button></div> -->
	    </div>
	    <div class="clearfix col-md-lg-6"></div><br>
	    <!-- <div class="col-md-4 col-md-offset-2"> -->
    	
	    <!-- </div> -->
	</form>
</div>
<div class="clearfix"></div>
</div>
<script type="text/javascript">
    function re_captcha() {
    $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('codeImg').src=$url;
  }
</script>
@endsection