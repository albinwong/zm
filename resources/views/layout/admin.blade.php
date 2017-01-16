<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/colorpicker/colorpicker.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">
<link rel="stylesheet" href="/admins/css/main.css">

<title>@yield('title')</title>

<title>MWS Admin - Dashboard</title>

</head>

<body>
    <!-- Themer (Remove if not needed) -->  
    <div id="mws-themer">
        <div id="mws-themer-css-dialog">
            <form class="mws-form">
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <a href="/"><img src="/homes/images/logo.png" alt="mws admin"></a>
                <span style="font-size:20px;color:white;">后台管理</span>
                
            </div>
        </div>
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <?php 
                        $res = DB::table('users')->where('id',session('uid'))->first();
                        if(empty($res))     return false;
                    ?>
                        <img src="{{$res->profile}}" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                <?php 
                    $t = date("H",time());
                    if ($t>=7 && $t<9) {
                      echo '早上好';
                    }else if($t>=9 && $t<11){
                      echo '上午好';
                    }else if($t>=11 && $t<13){
                      echo '中午好';
                    }else if($t>=13 && $t<19){
                      echo '下午好';
                    }else if($t>=19 && $t<23){
                      echo '晚上好';
                    }else{
                      echo '凌晨好';
                    }
                    echo ',&nbsp;'.session('uname')?>
                    </div>
                    <ul> 
                        <li><a href="/user/edit?id={{session('uid')}}">修改资料</a></li>
                        <li><a href="/logout">退出</a></li>
                    </ul>
                </div>
            </div>s
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-user"></i> 用户管理</a>
                        <ul class="closed">
                            <li><a href="/user/add">添加用户</a></li>
                            <li><a href="/user/index">用户列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-align-justify"></i> 分类管理</a>
                        <ul class="closed">
                            <li><a href="/cate/add">添加分类</a></li>
                            <li><a href="/cate/index">分类列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 菜品管理</a>
                        <ul class="closed">
                            <li><a href="/goods/add">添加菜品</a></li>
                            <li><a href="/goods/index">菜品列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 订单管理</a>
                        <ul class="closed">
                            <li><a href="/dlist">订单列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 关注管理</a>
                        <ul class="closed">
                            <li><a href="/shouc">关注列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 评价管理</a>
                        <ul class="closed">
                            <li><a href="/comment/index">评价列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 广告管理</a>
                        <ul class="closed">
                            <li><a href="/advert/add">添加广告</a></li>
                            <li><a href="/advert/index">广告列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 友情链接管理</a>
                        <ul class="closed">
                            <li><a href="/frlink/add">添加链接</a></li>
                            <li><a href="/frlink/index">链接列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 留言管理</a>
                        <ul class="closed">
                            <li><a href="/msg/index">留言列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 轮播管理</a>
                        <ul class="closed">
                            <li><a href="/viwe/add">添加轮播</a></li>
                            <li><a href="/viwe/index">轮播列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i> 地址管理</a>
                        <ul class="closed">
<<<<<<< HEAD
                            <li><a href="/addr/index">地址列表</a></li>
                        </ul>
                    </li>

=======
                           
                            <li><a href="/addr/index">地址列表</a></li>
                        </ul>
                    </li>
>>>>>>> 48ce04e62417305a8dcc05f0a5d1719a086b7dbd
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
                @if(session('info'))
                <div class="mws-form-message info">
                    {{session('info')}}
                </div>
                @endif

                @if(session('error'))
                <div class="mws-form-message error">
                    {{session('error')}}
                </div>
                @endif

                @if(session('warning'))
                <div class="mws-form-message warning">
                    {{session('warning')}}
                </div>
                @endif

                 @if(session('alert'))
                <div class="mws-form-message alert">
                    {{session('alert')}}
                </div>
                @endif


                @section('content')
                @show
            
            </div>
            <!-- Inner Container End -->
            <!-- Footer -->
            <div id="mws-footer">
                Copyright &copy; zm.com 2016. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>

</body>
</html>