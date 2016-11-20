<html>  
    <head>  
    <meta charset="utf-8">  
    <title>系统登录</title>  
    <style type="text/css">  
* {
    margin: 0;
    padding: 0;
}
body {
    font-family: Microsoft YaHei,Segoe UI,Tahoma,Arial,Verdana,sans-serif;
    font-size: 12px;
    color: #fff;
    line-height: 1;
    /*background: url('/homes/images/login_bg.jpg') no-repeat;*/
    background-size:80%;
    background-color:red;
}

.login{
    padding:20px;
    margin:20px;
}

ul,li {
    list-style: none;
}

.login-box {
    width: 490px;
    margin: 30px auto 20px auto;
    padding: 50px;
    border-radius: 10px;
    border:1px solid #ddd;
    background:#ddd;
    opacity:0.8;

}

.login-box .name,.login-box .password,.login-box .code,.login-box{
    font-size: 16px;
    color:orange;
}

.login-box label {
    display: inline-block;
    width: 100px;
    text-align: right;
    vertical-align: middle;
}

.login-box #code {
    width: 170px;
}

.login-box .codeImg {
    float: right;
    margin-top: 26px;
}

.login-box img {
    width: 130px;
    height: 40px;
    border: none;
}

input[type=text],input[type=password] {
    width: 220px;
    height: 42px;
    margin-top: 30px;
    padding: 0px 15px;
    /*border: 1px solid rgba(255,255,255,.15);*/
    border-radius: 6px;
    letter-spacing: 2px;
    font-size: 16px;
    opacity: 0.7;
}

button {
    cursor: pointer;
    width: 100%;
    height: 44px;
    padding: 0;
    background: #ef4300;
    border: 1px solid #ff730e;
    border-radius: 6px;
    color: #fff;
    font-size: 24px;
    letter-spacing: 15px;
    text-shadow: 0 1px 2px rgba(0,0,0,.1);
}
</style>
</head>  
<body>  
    <div class="login-box">  
        <h1 style="text-align:center">会员登录</h1><br><br>
        <form action="/dologin" method="post">  
            <div class="name">  
            用户名：
            <input type="text" name="username" placeholder="请输入您的用户名"><span>用户名已存在</span>
            </div>  
            <div class="password">  
           密&emsp;码：
            <input type="password"  maxlength="16" name="password" placeholder="请输入您的密码"><span>用户名已存在</span>
            </div>  
            <div class="code">  
                验证码：  
                <input id="code" type="text" maxlength="6" placeholder="请输入验证码" name="code">
                <div class="codeImg">
                    <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="codeImg" border="0"><span>验证码输入有误</span>
                </div> 

                {{csrf_field()}}
            </div>
            <div class="login">  
                <button>登录</button>  
            </div> 
             <span><a href="#" style="text-decoration:none;">忘记密码</a></span> 
        </form>  
    </div>  
</body>
<script>  
  function re_captcha() {
    $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('codeImg').src=$url;
  }
</script>
</html>  
