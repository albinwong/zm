<html>  
    <head>  
    <meta charset="utf-8">  
    <title>会员注册</title>  
    <style type="text/css">  
body {
    background-image:url('/homes/images/reg_bg.jpg');
}

.login{
    padding:20px;
    margin:20px;
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
    color:#CC6666 ;
}

.login-box label {
    display: inline-block;
    width: 100px;
    text-align: right;
    vertical-align: middle;
}

.login-box #code {
    width: 210px;
    float:none;
}

.login-box img {
    width: 130px;
    height: 40px;
}

input {
    width: 220px;
    height: 42px;
    margin-top: 30px;
    padding: 0px 15px;
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
        <h2 style="text-align:center">会员注册</h2>
        <form action="/dologin" method="post">  
            <div class="name">  
            用&nbsp;户&nbsp;名：
            <input type="text" name="username" placeholder="请输入您的用户名"><span></span>
            </div>
            <div class="name">  
            邮&emsp;&nbsp;&nbsp;&nbsp;箱：
            <input type="email" name="email" placeholder="请输入您的邮箱"><span></span>
            </div>  
            <div class="password">  
           密&emsp;&nbsp;&nbsp;&nbsp;码：
            <input type="password"  maxlength="16" name="password" placeholder="请输入您的密码"><span></span>
            </div>
            <div class="password">  
           确认密码：
            <input type="password"  maxlength="16" name="repassword" placeholder="请输入您的密码"><span></span>
            </div>  
            <div class="code">  
                验&ensp;证&ensp;码：  
                <input id="code" type="text" maxlength="6" placeholder="请输入验证码" name="code">
                    <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="codeImg" border="0"></a><span></span>
                {{csrf_field()}}
            </div>
            <div class="login">  
                <button>登录</button>  
            </div> 
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
