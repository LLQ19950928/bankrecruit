@extends('layouts.resume')

@section('resumeStyle')
    <link rel="stylesheet" href="/css/common/resume.css">
    <script src="/js/frontend/resume/workexperienceinfo.js"></script>
@endsection

@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">工作实习情况</div>
        </div>
        <div>
            <button class="add_button" id="addButton">继续添加</button>
        </div>
        <div>
            @if($data)
                <table class="table_style">
                    <tr>
                        <th>工作单位</th>
                        <th>职位名称</th>
                        <th>起始时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $work)
                    <tr>
                        <td>{{ $work['work_place'] }}</td>
                        <td>{{ $work['job_name'] }}</td>
                        <td>{{ $work['start_date'] }}</td>
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
                        <td width="115">起始日期</td>
                        <td>
                            <input type="text" name="start_date" value="" id="startDate">
                        </td>
                        <td width="115">结束日期</td>
                        <td>
                            <input type="text" name="end_date" value="" id="endDate">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">工作单位</td>
                        <td>
                            <input type="text" name="work_place" value=''>
                        </td>
                        <td width="115">所在部门</td>
                        <td>
                            <input type="text" name="department" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>职位名称</td>
                        <td>
                            <input type="text" name="job_name" value="">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">用工形式</td>
                        <td>
                            <select name="work_style">
                                <option selected="selected">-------请选择------</option>
                                <option value="1">正式员工</option>
                                <option value="2">实习生</option>
                                <option value="3">兼职人员</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="115">工作业绩</td>
                        <td colspan="3" height="250">
                            <textarea rows="12" cols="60" name="achievement"></textarea>
                        </td>
                    </tr>
                </table>
            </form>
            <button id="saveButton" class="button">保存</button>
        </div>
    </div>
@endsection