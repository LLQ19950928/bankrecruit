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

                          <td width="210" align="center">申请日期</td>
                          <td width="200" align="center">操作</td>
                        </tr>
                        @if($data)
                        <tr height="40">
                            <td width="180" align="center" style="font-size: 14px">{{ $data['company'] }}</td>
                            <td width="210" align="center" style="font-size: 14px">{{ $data['job_name'] }}</td>
                            <td width="210" align="center" style="font-size: 14px">{{ $data['created_at'] }}</td>
                            <td width="200" align="center">
                                <a href="#" style="text-decoration: none">删除</a>
                            </td>
                        </tr>
                        @endif
                </table>
            </div>
        </div>
    </div>
@endsection