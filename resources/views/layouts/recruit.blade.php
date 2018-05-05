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
  <div class="head-title-box">
    <div class="head-title">
        <ul>
            <li>
                @if(session('userId'))
                    <span class="glyphicon glyphicon-user"></span>
                    <span style="color: white;line-height: 30px">{{ session('username') }}</span>
                @else
                    <span class="glyphicon glyphicon-pencil"></span>
                    <a href="http://bank.recruit.cn/frontend/register/display">注册</a>
                @endif
            </li>
            <li>
                @if(session('userId'))
                    <span class="glyphicon glyphicon-th-large" style="color: white"></span>
                    <a href="http://bank.recruit.cn/backend/login/loginout" style="color: white">退出登录</a>
                @else
                    <span class="glyphicon glyphicon-user" style="color: white"></span>
                    <a href="http://bank.recruit.cn/frontend/login/display">登录</a>
                @endif
            </li>
        </ul>
    </div>
  </div>
  <div class="head-menu">
    <img src="/image/homepage/9.jpg">
    <ul>
        <li>
           <a href="http://bank.recruit.cn/frontend/homepage/display" class="text-color">招聘首页</a>
        </li>
        <li>
            <a href="http://bank.recruit.cn/frontend/schoolrecruit/getSchoolRecruitInfo"
               class="text-color">校园招聘</a>
        </li>
        <li>
            <a href="http://bank.recruit.cn/frontend/socialrecruit/getSocialRecruitInfo"
               class="text-color">社会招聘</a>
        </li>
        <li>
            <a href="http://bank.recruit.cn/frontend/aboutbank/getIntroductionInfo"
               class="text-color">关于银行</a>
        </li>
        <li>
            <a href="http://bank.recruit.cn/frontend/announce/getAnnounceInfo"
               class="text-color">重要公告</a>
        </li>
        <li>
            <a href="javascript:void(0)"
               class="text-color" id="myRecruit" username="{{ session('username') }}">我的招聘</a>
        </li>
    </ul>
  </div>
  <div class="banner">
    <img src="/image/homepage/2.gif">
  </div>
  <div class="main">
      @yield('content')
  </div>
</body>
<script type="application/javascript">
    $("#myRecruit").click(function () {

        var username = $(this).attr('username');
        if(!username) {
            alert('请先登录');
        }else {
            window.location.href = 'http://bank.recruit.cn/frontend/resume/index';
        }
    });
</script>
</html>