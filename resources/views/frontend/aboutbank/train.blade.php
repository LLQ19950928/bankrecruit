@extends('layouts.recruit')

@section('title', '关于银行')

@section('style')

    <link rel="stylesheet" href="/css/layouts/resume.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/frontend/aboutbank/bankinfo.css">
    <script src="/js/jquery-ui.js"></script>
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
            <div class="navi_work_experience on">
                <div class="txt">
                    <span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;
                    培训发展
                </div>
            </div>
        </div>
    </div>
    <div class="about_boc_div_content_right">
        <div class="about_boc_div_content_right_above">
            <div id="aboutBocRightTagText"
                 style="color:#114D8A;font-size:18px;
                 float:left; margin-top:5px; margin-left: 30px">
                培训发展
            </div>
            <div>
                <img alt="" src="/image/BocRightTagBottomLine.jpg" style="margin-left:30px;">
            </div>
        </div>
        <div class="about_boc_div_content_right_bellow">
            <div class="about_boc_div_content_right_bellow1">
                <div id="aboutBocRightContent_1" class="aboutBocRightContent"
                     style="display: inline;">
                      <?php echo $data['train'] ?>
                </div>
            </div>
        </div>
    </div>
@endsection