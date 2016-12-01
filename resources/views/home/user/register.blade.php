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
        <form action="/register" method="post">  
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
                <button type="submit">登录</button>  
            </div> 
        </form>  
    </div>  
</body>
<script src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">  
 function re_captcha() {
    $url = "{{ URL('kit/captcha') }}";
    $url = $url + "/" + Math.random();
    document.getElementById('codeImg').src=$url;
  }
$(function(){
// 注册表单start
    // 用户名元素
    //检测变量
    var CUSER = false;
    var CPASS = false;
    var CMAIL = false;

    //用户名元素
    $('input[name=username]').focus(function(){
        // 修改当前元素的样式
        $(this).css('border','solid 1px blue');
        //显示文本
        $(this).next().show().html('请输入8~18位字母数字下划线').css('color','#888');
    }).blur(function(){
        //获取元素的值
        var v = $(this).val();
        //声明正则
        var reg = /^\w{8,18}$/;
        if(!reg.test(v)) {
            //
            $(this).css('border','solid 1px red');
            //修改文本
            $(this).next().html('用户名格式错误').css('color','red').show();
            CUSER = false;
        }else{
            var input = $(this);
            //发送ajax请求 验证用户名是否存在
            $.ajax({
                url: '/check/user',
                type: 'get',
                data: {username:v},
                success: function(data){
                    if(data == '0'){
                        input.css('border','solid 1px red');
                        input.next().html('用户名已存在!请换一个!!').css('color','red');
                        CUSER = false;
                    }else{
                        input.css('border','solid 1px #ddd');
                        input.next().html('√').css('color','green');
                        CUSER = true;
                    }
                },
                async: false
            });
        }
    });

    //邮箱元素
    $('input[name=email]').focus(function(){
        // 修改当前元素的样式
        $(this).css('border','solid 1px blue');
        //显示文本
        $(this).next().show().html('请输入您的常用邮箱').css('color','#888');
        CMAIL = false;
    });
    $('input[name=email]').blur(function(){
        //获取元素的值
        var v = $(this).val();
        //声明正则
        var reg = /^\w+@\w+\.(com.cn|cn|com|hk|edu|org)$/;
        if(!reg.test(v)) {
            //
            $(this).css('border','solid 1px red');
            //修改文本
            $(this).next().html('邮箱格式错误').css('color','red').show();
            CMAIL = false;
        }else{
            var input = $(this);
            //发送ajax请求 验证用户名是否存在
            $.ajax({
                url: '/check/email',
                type: 'get',
                data: {email:v},
                success: function(data){
                    if(data == '0'){
                        input.css('border','solid 1px red');
                        input.next().html('邮箱已注册!!请换一个!!').css('color','red');
                        CMAIL = false;
                    }else{
                        input.css('border','solid 1px #ddd');
                        input.next().html('√').css('color','green');
                        CMAIL = true;
                    }
                },
                async: false
            });
        }
    });

    //密码元素
    $('input[name=password]').focus(function(){
        $(this).css('border','solid 1px blue');
        $(this).next().html('请输入6~16位非空白字符!').css('color','#888').show();
        CPASS = false;
    }).blur(function(){
        //获取元素的值
        var v = $(this).val();
        //声明正则
        var reg = /^\S{6,20}$/;
        //检测
        var res = reg.test(v);
        if(!res) {
            $(this).css('border','solid 1px red');
            $(this).next().html('密码格式错误').css('color','red').show();
            CPASS = false;
        }else{
            $(this).css('border','solid 1px #ddd');
            $(this).next().html('√').css('color','green');
            CPASS = true;
        }
    });

    //密码元素
    $('input[name=repassword]').focus(function(){
        $(this).css('border','solid 1px blue');
        $(this).next().html('请输入6~16位非空白字符!').css('color','#888').show();
        CPASS = false;
    }).blur(function(){
        //获取元素的值
        var v = $(this).val();
        //声明正则
        var reg = /^\S{6,20}$/;
        //检测
        var res = reg.test(v);
        if(!res) {
            $(this).css('border','solid 1px red');
            $(this).next().html('密码格式错误').css('color','red').show();
            CPASS = false;
        }else{
            $(this).css('border','solid 1px #ddd');
            $(this).next().html('√').css('color','green');
            CPASS = true;
        }
    });

     //验证码
    $('input[name=code]').focus(function(){
        $(this).css('border','solid 1px blue');
       $(this).next().next().next().next().show().html('请输入验证码').css('color','#888');
       CCODE = false;
    }).blur(function(){
        //获取元素的值
        var v = $(this).val();
        //声明正则
        var reg = /^\w{5}$/;
        //检测
        var res = reg.test(v);
        if(!res) {
            $(this).css('border','solid 1px red');
            $(this).next().html('验证码格式错误').css('color','red').show();
            CCODE = false;
        }else{
            $(this).css('border','solid 1px #ddd');
            $(this).next().html('√').css('color','green');
            CCODE = true;
        }
    });

    //表单的提交事件
    $('form').submit(function(){
        $('input').trigger('blur');
        //检测元素的值是否正确
        if(CUSER && CPASS && CMAIl) {
            return true;            
        }
        return false;
    });

// 注册表单end
  });
</script>
</html>  
