@extends('layouts.recruit')

@section('title', '我的招聘')

@section('style')

    <link rel="stylesheet" href="/css/layouts/resume.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/layouts/resume.js"></script>
    <script src="/js/frontend/bankinfo/bankinfo.js"></script>
@endsection

@section('content')
    <div class="v_navi">
        <div class="title-resume">关于银行</div>
        <div class="li_box">
            <div class="navi_resume">
                <div class="txt">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;
                    企业简介
                </div>
            </div>
            <div class="navi_education">
                <div class="txt">
                    <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;
                    企业文化
                </div>
            </div>
            <div class="navi_work_experience">
                <div class="txt">
                    <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;
                    培训发展
                </div>
            </div>
        </div>
    </div>
    <div class="about_bank">
        hello world
    </div>
@endsection