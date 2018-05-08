@extends('layouts.admin_edit')

@section('edit_content')

    <title>新增文章 - 资讯管理 - H-ui.admin v3.0</title>
    <meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
    </head>
    <body>
    <article class="page-container">
        <form class="form form-horizontal" id="announceAdd" method="post" action="">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公告标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="title" value="{{ $data['title'] }}"
                           disabled="disabled">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>招聘单位：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="title" value="{{ $data['company'] }}"
                           disabled="disabled">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>过期时间</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" name="end_at" class="input-text"
                           disabled="disabled" value="{{ date('Y-m-d', $data['end_at']) }}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公告内容：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php echo $data['content'] ?>
                </div>
            </div>

        </form>
    </article>
    @endsection


    @section('edit_style')
        <!--请在下方写此页面业务相关的脚本-->
        <script type="text/javascript" src="/h-ui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
        <script type="text/javascript" src="/h-ui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
        <script type="text/javascript" src="/h-ui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
        <script type="text/javascript" src="/h-ui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
        <script type="text/javascript" src="/h-ui/lib/webuploader/0.1.5/webuploader.min.js"></script>
        <script type="text/javascript" src="/h-ui/lib/ueditor/1.4.3/ueditor.config.js"></script>
        <script type="text/javascript" src="/h-ui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
        <script type="text/javascript" src="/h-ui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
        <script type="text/javascript">
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });
            var ue = UE.getEditor('editor');

        </script>
@endsection