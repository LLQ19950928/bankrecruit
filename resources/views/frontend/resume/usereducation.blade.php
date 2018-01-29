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
    <script src="/js/frontend/resume/education.js"></script>
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
                <div class="navi_resume">
                    <div class="txt">
                        <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;
                        简历填写
                    </div>
                </div>
                <div class="navi_record on">
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
                <hr/>
                <p>教育经历</p>
                <form class="form-horizontal" id="educationForm" method="post">
                    <div class="form-group">
                        <label  class="col-md-2 control-label">最高学历</label>
                        <div class="col-sm-4 form-margin">
                            <select  name="highest_education">
                                @foreach($data['edu'] as $education)
                                    @if($data['userH'])
                                        <option value="{{ $education['id'] }}"
                                                @if($data['userH']['highest_education'] == $education['name'])selected="selected"@endif>{{ $education['name'] }}</option>
                                    @else
                                        <option value="{{ $education['id'] }}">{{ $education['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">最高学位</label>
                        <div class="col-sm-4 form-margin">
                            <select  name="highest_degree">
                                @foreach($data['degree'] as $degree)
                                    @if($data['userH'])
                                        <option value="{{ $degree['id'] }}"
                                                @if($data['userH']['highest_degree'] == $degree['name'])selected="selected"@endif>{{ $degree['name'] }}</option>
                                    @else
                                        <option value="{{ $degree['id'] }}">{{ $degree['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 save-button">
                            <button type="button" class="btn btn-primary col-sm-1"
                                    id="saveButton">保存</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="main_you22_3">
                <hr/>
                <p>教育经历</p>
                <form class="form-horizontal" id="educationForm" method="post">
                    <div class="form-group">
                        <label  class="col-md-2 control-label">取得学位</label>
                        <div class="col-sm-4 form-margin">
                            <select  name="acquire_education">
                                @foreach($data['edu'] as $education)
                                    @if($data['userE'])
                                        <option value="{{ $education['id'] }}"
                                                @if($data['userE']['highest_education'] == $education['name'])selected="selected"@endif>{{ $education['name'] }}</option>
                                    @else
                                        <option value="{{ $education['id'] }}">{{ $education['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">获得学位</label>
                        <div class="col-sm-4 form-margin">
                            <select  name="acquire_degree">
                                @foreach($data['degree'] as $degree)
                                    @if($data['userE'])
                                        <option value="{{ $degree['id'] }}"
                                                @if($data['userE']['highest_degree'] == $degree['name'])selected="selected"@endif>{{ $degree['name'] }}</option>
                                    @else
                                        <option value="{{ $degree['id'] }}">{{ $degree['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">入学时间</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" name="entrance_time" id="entranceTime">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">毕业时间</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" name="graduation_time" id="graduationTime">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">学校属地</label>
                        <div class="col-sm-4 form-margin">
                            <select  name="school_location" id="schoolLocation">
                                <option value="0"></option>
                                @foreach($data['location'] as $location)
                                    <option value="{{ $location['id'] }}">{{ $location['location_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">学校</label>
                        <div class="col-sm-4 form-margin">
                            <select name="school_name" id="schoolName">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">院系</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" name="academy_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">专业</label>
                        <div class="col-sm-4 form-margin">
                            <input type="text" class="form-control" name="profession_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">培养方式</label>
                        <div class="col-sm-4 form-margin">
                            <select  name="train_type">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">教育类型</label>
                        <div class="col-sm-4 form-margin">
                            <select  name="education_type">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 save-button">
                            <button type="button" class="btn btn-primary col-sm-1"
                                    id="saveButton">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection