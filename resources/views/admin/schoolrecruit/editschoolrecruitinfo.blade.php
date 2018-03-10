@extends('layouts.admin_edit')

@section('edit_content')

    <title>新增校园招聘 - 校园招聘管理 - H-ui.admin v3.0</title>
    <meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
    </head>
    <body>
    <article class="page-container">
        <form class="form form-horizontal" id="recruitAdd" method="post" action="">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>职位名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="job_name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>考试地点：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"
                           name="exam_place" placeholder="多个考试地点以英文逗号‘,’分割">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>面试地点：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"
                           name="interview_place" placeholder="多个面试地点以英文逗号‘,’分割">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>招聘人数：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"
                           name="number" placeholder="填具体人数或者若干">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>工作地点：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"
                           name="work_place">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>开始日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"
                           name="start_date">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>截止日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"
                           name="end_date">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>招聘单位：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"
                           name="company">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否发布：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="status" class="select">
					<option value="0">----请选择----</option>
					<option value="1">是</option>
					<option value="2">否</option>
				</select>
				</span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>招聘类型：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="recruit_type" class="select">
					<option value="0">----请选择----</option>
					<option value="1">校园招聘</option>
					<option value="2">社会招聘</option>
				</select>
				</span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>主要职责：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <script id="duty" type="text/plain" style="width:100%;height:300px;" name="duty"></script>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>应聘基本条件：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <script id="conditionEditor" type="text/plain" style="width:100%;height:300px;"
                        name="condition"></script>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>职位具体要求：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <script id="requirement" type="text/plain"
                            style="width:100%;height:300px;" name="requirement"></script>
                </div>
            </div>
            <div class="row cl">
               <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                  <button class="btn btn-primary radius" type="button" id='commitButton'><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
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

                        var conditionEditor = UE.getEditor('conditionEditor');
                        var requirement = UE.getEditor('requirement');
                        var duty = UE.getEditor('duty');

                        $('#commitButton').click(function () {
                            $.ajax({
                                url: 'http://bank.schoolrecruit.cn/admin/schoolrecruit/editSchoolRecruitInfo',
                                dataType: 'json',
                                type: 'post',
                                data: $('#recruitAdd').serialize(),
                                success: function (res) {
                                    if (res.code != 201) {
                                        alert(res.msg);
                                    }else {
                                        alert('添加成功');
                                    }
                                }
                            });
                        });
                    </script>
@endsection