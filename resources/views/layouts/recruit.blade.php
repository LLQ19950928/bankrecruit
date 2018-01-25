<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/layouts/recruit.css">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    @yield('style')
</head>
<body>
<div>
    <div class="head-title-box">
        <div class="head-title">
            <ul>
                <li>
                    <span class="glyphicon glyphicon-pencil" style="color: white"></span>
                    <a href="http://bank.recruit.cn/frontend/register/display" style="color: white">注册</a>
                </li>
                <li style="color: white">&nbsp;|&nbsp;</li>
                <li>
                    <span class="glyphicon glyphicon-user" style="color: white"></span>
                    <a href="http://bank.recruit.cn/frontend/login/display" style="color: white">登录</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="nav">
        @section('position')
            <ul>
                <li>
                    <a href="#">招聘首页</a>
                </li>
                <li>
                    <a href="#">校园招聘</a>
                </li>
                <li>
                    <a href="#">社会招聘</a>
                </li>
                <li>
                    <a href="#">重要公告</a>
                </li>
                <li>
                    <a href="#">提问与回答</a>
                </li>
                <li>
                    <a href="#">我的招聘</a>
                </li>
            </ul>
        @show
    </div>
    <div class="pictureplace">
        <div class="pictureplacecenter">
            <img src="/image/commonbanner.jpg">
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</div>
</body>
</html>