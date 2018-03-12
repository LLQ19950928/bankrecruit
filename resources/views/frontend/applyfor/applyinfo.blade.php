@extends('layouts.recruit')

@section('title', '银行主页')

@section('style')
    <link rel="stylesheet" href="/css/frontend/resume/index.css">
    <script src="/js/frontend/homepage/display.js"></script>
    <script src="/js/frontend/myrecruit/myrecruit.js"></script>
@endsection

@section('content')
    <div class="main">
        <div class="v_navi">
            <div class="title">我的招聘</div>
            <div class="li_box">
                <div class="navi_resume">
                    <div class="txt">
                        <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;
                        简历信息
                    </div>
                </div>
                <div class="navi_record on">
                    <div class="txt">
                        <span class="glyphicon glyphicon-folder-close"></span>&nbsp;&nbsp;
                        应聘信息
                    </div>
                </div>
                <div class="navi_account">
                    <div class="txt">
                        <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;
                        通知消息
                    </div>
                </div>
            </div>
        </div>
        <div class="main_you2">
            <div class="main_you2_3">
                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                       <tr height="40" bgcolor="#114D8B" style="color: #FFF; font-size: 14px">
                          <td width="100" align="center">机构名称</td>
                          <td width="210" align="center">职位名称</td>
                          <td width="210" align="center">招聘进度</td>
                          <td width="210" align="center">申请日期</td>
                        </tr>
                    @foreach($data as $apply)
                        <tr height="40">
                            <td width="100" align="center">{{ $apply['company'] }}</td>
                            <td width="210" align="center">{{ $apply['job_id'] }}</td>
                            <td width="210" align="center">{{ $apply['status'] }}</td>
                            <td width="210" align="center">{{ $apply['created_at'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection