@extends('layouts.admin_edit')

@section('edit_content')

    <title>新增校园招聘 - 校园招聘管理 - H-ui.admin v3.0</title>
    <meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
    </head>
    <body>
    <article class="page-container">
        @if($data)
            <input type="hidden" value="{{ $data['introduction'] }}" id="intro">
            <input type="hidden" value="{{ $data['culture'] }}" id="cul">
            <input type="hidden" value="{{ $data['train'] }}" id="tra">
        @endif
        <form class="form form-horizontal" id="bankInfoAdd" method="post" action="">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>银行介绍：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <script id="introduction" type="text/plain" style="width:100%;height:300px;" name="introduction"></script>
                    </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>银行文化：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <script id="culture" type="text/plain" style="width:100%;height:300px;"
                    name="culture"></script>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>培训发展：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <script id="train" type="text/plain"
                            style="width:100%;height:300px;" name="train"></script>
                    </div>
                    </div>
                    <div class="row cl">
                        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                        <button class="btn btn-primary radius" type="button" id='commitButton'><i class="Hui-iconfont">&#xe632;</i> 保存并提交</button>
                    <button  class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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

                        var introduction = UE.getEditor('introduction');
                        var culture = UE.getEditor('culture');
                        var train = UE.getEditor('train');

                        introduction.ready(function () {

                            var intro = $('#intro').val();
                            introduction.setContent(intro);
                        });

                        culture.ready(function () {

                            var cul = $('#cul').val();
                            culture.setContent(cul);
                        });

                        train.ready(function () {

                            var tra = $('#tra').val();
                            train.setContent(tra);
                        });

                        $('#bankInfoAdd').click(function () {
                            $.ajax({
                                url: 'http://bank.recruit.cn/admin/aboutbank/editBankInfo',
                                dataType: 'json',
                                type: 'post',
                                data: $('#bankInfoAdd').serialize(),
                                success: function (res) {
                                    if (res.code != 201) {
                                        alert(res.msg);
                                    }else {
                                        alert('编辑成功');
                                    }
                                }
                            });
                        });
                    </script>
@endsection