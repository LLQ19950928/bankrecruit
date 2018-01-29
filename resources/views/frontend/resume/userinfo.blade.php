@extends('layouts.recruit')

@section('title', '我的招聘')

@section('style')
    <link href="/css/datepicker/foundation.min.css" rel="stylesheet" type="text/css">
    <link href="/css/datepicker/foundation-datepicker.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/frontend/resume/edit.css">
    <link rel="stylesheet" href="/css/distpicker/city-picker.css">
    <script src="/js/datepicker/foundation-datepicker.js"></script>
    <script src="/js/datepicker/locales/foundation-datepicker.zh-CN.js"></script>
    <script src="/js/distpicker/city-picker.data.js"></script>
    <script src="/js/distpicker/city-picker.js"></script>
    <script src="/js/distpicker/main.js"></script>
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
            <div class="title-resume">我的招聘</div>
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
                <form class="form-horizontal" id="resumeForm" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label">真实姓名</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control"
                                   placeholder="真实姓名" name="name"
                                   @if($data['userInfo'])
                                      value="{{ $data['userInfo']['name'] }}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">性别</label>
                        <div class="col-sm-4 form-margin">
                            <select  name="gender">
                                @if($data['userInfo'])
                                    <option value="1" @if($data['userInfo']['gender'] == '男') selected="selected" @endif>男</option>
                                    <option value="2" @if($data['userInfo']['gender'] == '女') selected="selected" @endif>女</option>
                                @else
                                    <option value="1" selected="selected">男</option>
                                    <option value="2" selected="selected">女</option>
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">出生日期</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control"
                                   placeholder="出生日期" name="broth_at" id="brothAt"
                                   @if($data['userInfo'])
                                      value="{{ $data['userInfo']['broth_at'] }}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">民族</label>
                        <div class="col-sm-4 form-margin">
                            <select name="nation" id="nation">
                                @foreach($data['nation'] as $nation)
                                  <option value="{{ $nation['id'] }}">{{ $nation['nation'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">家庭常住地</label>
                        <div class="col-sm-6 form-margin">
                            <input class="form-control" readonly type="text" placeholder="家庭常住地"
                                   data-toggle="city-picker" name="family_at"
                                   @if($data['userInfo'])
                                       value="{{ $data['userInfo']['family_at'] }}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">籍贯</label>
                        <div class="col-sm-6 form-margin">
                            <input type="text" class="form-control" placeholder="籍贯"
                                   name="place_of_origin" readonly data-toggle="city-picker"
                                   @if($data['userInfo'])
                                     value="{{ $data['userInfo']['place_of_origin'] }}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">婚姻状况</label>
                        <div class="col-sm-4 form-margin">
                            <select name="marry">
                                @if($data['userInfo'])
                                  <option value="1" @if($data['userInfo']['marry'] == '未婚') selected="selected" @endif>未婚</option>
                                  <option value="2" @if($data['userInfo']['marry'] == '已婚') selected="selected" @endif>已婚</option>
                                  <option value="3" @if($data['userInfo']['marry'] == '离异') selected="selected" @endif>离异</option>
                                  <option value="4" @if($data['userInfo']['marry'] == '其它') selected="selected" @endif>其它</option>
                                @else
                                  <option value="1">未婚</option>
                                  <option value="2">已婚</option>
                                  <option value="3">离异</option>
                                  <option value="4">其它</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">政治面貌</label>
                        <div class="col-sm-4 form-margin">
                            <select name="political_status" id="polity">
                                @foreach($data['polity'] as $polity)
                                    <option value="{{ $polity['id'] }}">{{ $polity['political_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">证件类别</label>
                        <div class="col-sm-4 form-margin">
                            <select name="id_type">
                                @if($data['userInfo'])
                                    <option value="1" @if($data['userInfo']['id_type'] == '身份证') selected="selected" @endif>身份证</option>
                                    <option value="2" @if($data['userInfo']['id_type'] == '护照') selected="selected" @endif>护照</option>
                                    <option value="3" @if($data['userInfo']['id_type'] == '军官照') selected="selected" @endif>军官证</option>
                                    <option value="4" @if($data['userInfo']['id_type'] == '港澳通行证') selected="selected" @endif>港澳通行证</option>
                                    <option value="5" @if($data['userInfo']['id_type'] == '台胞通行证') selected="selected" @endif>台胞通行证</option>
                                    <option value="6" @if($data['userInfo']['id_type'] == '其它') selected="selected" @endif>其它</option>
                                @else
                                    <option value="1">身份证</option>
                                    <option value="2">护照</option>
                                    <option value="3">军官证</option>
                                    <option value="4">港澳通行证</option>
                                    <option value="5">台胞通行证</option>
                                    <option value="6">其它</option>
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">证件号码</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" placeholder="证件号码" name="id_number"
                                   @if($data['userInfo']) value="{{ $data['userInfo']['id_number'] }}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">联系方式</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" placeholder="联系方式" name="phone_number"
                                   @if($data['userInfo']) value="{{ $data['userInfo']['phone_number'] }}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 save-button">
                            <button type="button" class="btn btn-primary col-sm-3" id="saveButton"
                                    @if($data['userInfo']) userId="{{ $data['userInfo']['id'] }}" @endif>保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



