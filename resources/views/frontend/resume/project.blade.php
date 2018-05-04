@extends('layouts.resume')

@section('resumeStyle')
    <link rel="stylesheet" href="/css/common/resume.css">
    <script src="/js/frontend/resume/project.js"></script>
@endsection

@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">项目经验</div>
        </div>
        <div>
            <button class="add_button" id="addButton">继续添加</button>
        </div>
        <div>
            @if($data)
                <table class="table_style">
                    <tr>
                        <th>开始时间</th>
                        <th>结束时间</th>
                        <th>项目名称</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $project)
                        <tr>
                            <td>{{ $project['start_date'] }}</td>
                            <td>{{ $project['end_date'] }}</td>
                            <td>{{ $project['project_name'] }}</td>
                            <td>
                                <a href="javascript:void(0)">修改</a>
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
                        <td width="115">开始时间</td>
                        <td>
                            <input type="text" name="start_date" value="" onClick="WdatePicker()">
                        </td>
                        <td width="115">结束时间</td>
                        <td>
                            <input type="text" name="end_date" value="" onClick="WdatePicker()">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">项目名称</td>
                        <td>
                            <input type="text" name="project_name" value='' style="width: 300px">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">项目描述</td>
                        <td colspan="3" height="250">
                            <textarea rows="12" cols="60" name="project_desc"></textarea>
                        </td>
                    </tr>
                </table>
            </form>
            <button id="saveButton" class="button">保存</button>
        </div>
    </div>
@endsection