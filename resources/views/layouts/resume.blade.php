@extends('layouts.recruit')

@section('title', '我的招聘')

@section('style')

    <link rel="stylesheet" href="/css/layouts/resume.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/layouts/resume.js"></script>
    @yield('resumeStyle')
@endsection

@section('content')
    <div>
        <div class="v_navi">
            <div class="title-resume">我的招聘</div>
            <div class="li_box">
                <div class="navi_resume">
                    <div class="txt">
                        <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;
                        简历填写
                    </div>
                </div>
                <div class="navi_education">
                    <div class="txt">
                        <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;
                        教育背景
                    </div>
                </div>
                <div class="navi_work_experience">
                    <div class="txt">
                        <span class="glyphicon glyphicon-text-color"></span>&nbsp;&nbsp;
                        工作实习
                    </div>
                </div>
                <div class="navi_bonus">
                    <div class="txt">
                        <span class="glyphicon glyphicon-paperclip"></span>&nbsp;&nbsp;
                        奖项信息
                    </div>
                </div>
                <div class="navi_family">
                    <div class="txt">
                        <span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
                        家庭信息
                    </div>
                </div>
            </div>
        </div>
        @yield('detail')
    </div>
@endsection