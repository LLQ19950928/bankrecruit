<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="favicon.ico" >
    <link rel="Shortcut Icon" href="favicon.ico" />

    <link rel="stylesheet" type="text/css" href="/h-ui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/h-ui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/h-ui/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/h-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/h-ui/static/h-ui.admin/css/style.css" />

<!--/meta 作为公共模版分离出去-->

    <title>@yield('title')</title>
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">H-ui.admin</a>
            <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>{{ session('adminName') }}</li>
                    <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="{{ url('admin/login/loginOut') }}">退出</a></li>
                        </ul>
                    </li>
                    <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">

    <div class="menu_dropdown bk_2">
        <dl id="menu-article">
            <dt>
                <i class="Hui-iconfont">&#xe616;</i>
                公告管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a href="http://bank.recruit.cn/admin/announce/getAnnounceInfo" title="公告列表">
                            公告列表
                        </a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-picture">
            <dt class="selected">
                <i class="Hui-iconfont">&#xe613;</i>
                校园招聘管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd style="display:block">
                <ul>
                    <li>
                        <a href="http://bank.recruit.cn/admin/schoolrecruit/getSchoolRecruitInfo"
                           title="图片管理">
                            校园招聘列表
                        </a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-picture">
            <dt class="selected">
                <i class="Hui-iconfont">&#xe613;</i>
                社会招聘管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd style="display:block">
                <ul>
                    <li>
                        <a href="http://bank.recruit.cn/admin/socialrecruit/getSocialRecruitInfo"
                           title="社会招聘">
                            社会招聘列表
                        </a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt>
                <i class="Hui-iconfont">&#xe620;</i>
                职位申请管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li><a href="http://bank.recruit.cn/admin/apply/getApplyInfo" title="品牌管理">职位申请列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-comments">
            <dt>
                <i class="Hui-iconfont">&#xe622;</i> 银行信息
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a href="http://bank.recruit.cn/admin/aboutbank/getBankInfo"
                           title="评论列表">编辑银行信息</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-comments">
            <dt>
                <i class="Hui-iconfont">&#xe622;</i> 通知管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a href="http://bank.recruit.cn/admin/notice/noticeManage"
                           title="评论列表">群发邮件</a>
                    </li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->

@yield('content')

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/h-ui/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/h-ui/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->
@yield('style')
</body>
</html>