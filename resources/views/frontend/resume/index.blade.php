@extends('layouts.recruit')

@section('title', '银行主页')

@section('style')
    <link rel="stylesheet" href="/css/frontend/resume/index.css">
    <script src="/js/frontend/homepage/display.js"></script>
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
    <div class="v_navi">
        <div class="title">我的招聘</div>
        <div class="li_box">
            <div class="navi_resume on">
               <div class="txt">
                   <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;
                   简历信息
               </div>
            </div>
            <div class="navi_record">
                <div class="txt">
                    <span class="glyphicon glyphicon-folder-close"></span>&nbsp;&nbsp;
                    应聘信息
                </div>
            </div>
            <div class="navi_account">
                <div class="txt">
                    <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;
                    账户信息
                </div>
            </div>
        </div>
    </div>
    <div class="main_you2">
        <div class="main_you2_3">
            <table width="730" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                <tr height="40" bgcolor="#114D8B" style="color: #FFF; font-size: 14px">
                    <td width="100" align="center">编号</td>
                    <td width="210" align="center">内容</td>
                    <td width="210" align="center">操作</td>
                </tr>
                <tr height="40">
                    <td align="center" style="color: #333333">1</td>
                    <td align="center" style="color: #333333">我的简历</td>
                    <td align="center">
                        <a href="http://bank.recruit.cn/frontend/resume/edit" style="color: #2281d9">编辑</a>
                        <span style="color: #2281d9">&nbsp;|&nbsp;</span>
                        <a href="#" style="color: #2281d9">预览</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection