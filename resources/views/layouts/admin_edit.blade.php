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

    <script src="/js/frontend/resume/workexperienceinfo.js"></script>
<!--/meta 作为公共模版分离出去-->


</head>
<body>
@yield('edit_content')


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/h-ui/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/h-ui/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->

@yield('edit_style')

</body>
</html>