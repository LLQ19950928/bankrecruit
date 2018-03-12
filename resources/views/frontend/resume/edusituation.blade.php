@extends('layouts.resume')

@section('resumeStyle')
    <link rel="stylesheet" href="/css/common/resume.css">
    <link rel="stylesheet" href="/layer/mobile/need/layer.css">
    <script src="/layer/layer.js"></script>
    <script src="/js/frontend/resume/education.js"></script>
    <script src="/My97DatePicker/WdatePicker.js"></script>
@endsection

@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">教育信息</div>
        </div>
        <div>
            <button class="add_button" id="addButton">继续添加</button>
            <button class="cancel_button" id="cancelButton">取消</button>
        </div>
        <div>
            @if($data)
                <table class="table_style">
                    <tr>
                        <th>毕业院校</th>
                        <th>学位</th>
                        <th>起始时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $edu)
                        <tr>
                            <td>{{ $edu['school_name'] }}</td>
                            <td>
                                @if($edu['degree'] == 1)
                                     学士
                                @elseif($edu['degree'] == 2)
                                     硕士
                                @elseif($edu['degree'] == 3)
                                     博士
                                @endif
                            </td>
                            <td>{{ $edu['start_date'] }}</td>
                            <td>
                                <a href="javascript:void(0)"
                                    onclick="updateEdu('http://bank.recruit.cn/frontend/resume/updateEduInfo?id={{ $edu['id'] }}')">
                                    修改
                                </a>
                                <a href="javascript:void(0)">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
        <div class="main_you22_3" style="display: none">
            <form method="post" id="resumeForm">
                <table width="700" border="0" align="center" cellpadding="0"
                       cellspacing="0" id="info" style="border-collapse:separate; border-spacing: 0px 20px;">
                    <tr>
                        <td width="115">起始日期</td>
                        <td>
                            <input type="text" name="start_date" value=""
                                   id="startDate"  onClick="WdatePicker()">
                        </td>
                        <td width="115">结束日期</td>
                        <td>
                            <input type="text" name="end_date"
                                   value="" id="endDate" onClick="WdatePicker()">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">学历</td>
                        <td>
                            <select name="education">
                                <option selected="selected">-------请选择------</option>
                                <option value="1">大专</option>
                                <option value="2">本科</option>
                                <option value="3">硕士研究生</option>
                                <option value="4">博士研究生</option>
                                <option value="5">无</option>
                            </select>
                        </td>
                        <td width="115">学位</td>
                        <td>
                            <select name="degree">
                                <option selected="selected">-------请选择------</option>
                                <option value="1">学士</option>
                                <option value="2">硕士</option>
                                <option value="3">博士</option>
                                <option value="4">无</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="115">学校</td>
                        <td>
                            <input type="text" name="school_name" value=''>
                        </td>
                        <td width="115">学习形式</td>
                        <td>
                            <select name="study_style">
                                <option selected="selected">-------请选择------</option>
                                <option value="1">全日制</option>
                                <option value="2">非全日制</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>专业名称</td>
                        <td>
                            <input type="text" name="major" value="">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">专业排名</td>
                        <td>
                            <select name="rank">
                                <option selected="selected">-------请选择------</option>
                                <option value="1">前10%</option>
                                <option value="2">前20%</option>
                                <option value="3">前30%</option>
                                <option value="4">前50%</option>
                                <option value="4">其它</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <button id="saveButton" class="button">保存</button>
        </div>
    </div>
    <script type="application/javascript">
        function updateEdu(url) {

            layer.open({
                type: 2,
                title: '修改信息',
                closeBtn: 1, //不显示关闭按钮
                shade: [0],
                area: ['740px', '400px'],
                anim: 2,
                maxmin: true,
                content: [url, 'yes'],

            });

        }
    </script>
@endsection