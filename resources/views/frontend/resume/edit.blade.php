@extends('layouts.recruit')

@section('title', '我的招聘')

@section('style')
    <link href="/css/datepicker/foundation.min.css" rel="stylesheet" type="text/css">
    <link href="/css/datepicker/foundation-datepicker.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/frontend/resume/edit.css">
    <script src="/js/datepicker/foundation-datepicker.js"></script>
    <script src="/js/datepicker/locales/foundation-datepicker.zh-CN.js"></script>
    <script src="/js/frontend/resume/edit.js"></script>
@endsection

@section('position')
    <ul>
        <li>
            <a href="http://bank.recruit.cn/frontend/homepage/display">招聘首页</a>
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
            <a href="http://bank.recruit.cn/frontend/resume/index" class="current">我的招聘</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="col-md-4">
        <div class="v_navi">
            <div class="title">我的招聘</div>
            <div class="li_box">
                <div class="navi_resume on">
                    <div class="txt">
                        <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;
                        简历填写
                    </div>
                </div>
                <div class="navi_record">
                    <div class="txt">
                        <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;
                        教育背景
                    </div>
                </div>
                <div class="navi_account">
                    <div class="txt">
                        <span class="glyphicon glyphicon-text-color"></span>&nbsp;&nbsp;
                        外语能力
                    </div>
                </div>
                <div class="navi_account">
                    <div class="txt">
                        <span class="glyphicon glyphicon-paperclip"></span>&nbsp;&nbsp;
                        学分绩点
                    </div>
                </div>
                <div class="navi_account">
                    <div class="txt">
                        <span class="glyphicon glyphicon-flash"></span>&nbsp;&nbsp;
                        奖惩情况
                    </div>
                </div>
                <div class="navi_account">
                    <div class="txt">
                        <span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
                        家庭信息
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="main_you2">
            <div class="main_you22_3">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">真实姓名</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" placeholder="真实姓名" name="realname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">性别</label>
                        <div class="col-sm-4 form-margin">
                            <select class="form-control" name="gender">
                                <option value="0">男</option>
                                <option value="1">女</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">出生日期</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" placeholder="出生日期" name="borth_at" id="brothAt">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">民族</label>
                        <div class="col-sm-4 form-margin">
                            <select class="form-control" name="gender">
                                <option value="0">汉族</option>
                                <option value="1">满族</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">家庭常住地</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" placeholder="家庭常住地" name="borth_at">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">籍贯</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" placeholder="籍贯" name="borth_at">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">婚姻状况</label>
                        <div class="col-sm-4 form-margin">
                            <select class="form-control" name="gender">
                                <option value="0">未婚</option>
                                <option value="1">已婚</option>
                                <option value="1">离异</option>
                                <option value="1">其它</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">政治面貌</label>
                        <div class="col-sm-4 form-margin">
                            <select class="form-control" name="gender">
                                <option value="0">未婚</option>
                                <option value="1">已婚</option>
                                <option value="1">离异</option>
                                <option value="1">其它</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">证件类别</label>
                        <div class="col-sm-4 form-margin">
                            <select class="form-control" name="gender">
                                <option value="0">未婚</option>
                                <option value="1">已婚</option>
                                <option value="1">离异</option>
                                <option value="1">其它</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">证件号码</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" placeholder="证件号码" name="borth_at">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">联系方式</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" placeholder="联系方式" name="borth_at">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 save-button">
                            <button type="button" class="btn btn-primary col-sm-3" id="registerButton">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



