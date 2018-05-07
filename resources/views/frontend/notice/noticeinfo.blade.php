@extends('layouts.recruit')

@section('title', '银行主页')

@section('style')
    <link rel="stylesheet" href="/css/frontend/resume/index.css">
    <link rel="stylesheet" href="/layer/mobile/need/layer.css">
    <script src="/js/frontend/homepage/display.js"></script>
    <script src="/layer/layer.js"></script>
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
                <div class="navi_record">
                    <div class="txt">
                        <span class="glyphicon glyphicon-folder-close"></span>&nbsp;&nbsp;
                        应聘信息
                    </div>
                </div>
                <div class="navi_account on">
                    <div class="txt">
                        <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;
                        通知消息
                    </div>
                </div>
            </div>
        </div>
        <div class="main_you2">
            <div class="main_you2_3">
                @if($data)
                    <table width="730" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                        <tr height="40" bgcolor="#114D8B" style="color: #FFF; font-size: 14px">
                            <td width="100" align="center">通知发布机构</td>
                            <td width="210" align="center">通知类型</td>
                            <td width="100" align="center">日期</td>
                            <td width="210" align="center">操作</td>
                        </tr>
                        <tr height="40">
                            <td align="center" style="color: #333333">{{ $data['company'] }}</td>
                            <td align="center" style="color: #333333">{{ $data['type_value'] }}</td>
                            <td align="center" style="color: #333333">{{ $data['updated_at'] }}</td>
                            <td align="center">
                                <a href="javascript:void(0)" style="color: #2281d9"
                                   onclick="displayDetail('http://bank.recruit.cn/frontend/notice/getNoticeDetail?type=1')">查看详细</a>
                            </td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function displayDetail(url) {

            var index = layer.open({
                type: 2,
                title: '查看详细',
                area: ['840px', '600px'],
                content: url,
            });

            layer.full(index);
        }
    </script>
@endsection