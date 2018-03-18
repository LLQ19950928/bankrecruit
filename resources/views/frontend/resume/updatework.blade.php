<html>
    <head>
        <link rel="stylesheet" href="/css/layouts/resume.css">
        <link rel="stylesheet" href="/layer/mobile/need/layer.css">
        <link rel="stylesheet" href="/css/frontend/resume/updateinfo.css">
        <script src="/layer/layer.js"></script>
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/My97DatePicker/WdatePicker.js"></script>
        <script src="/js/frontend/resume/updatework.js"></script>
    </head>
    <body>
    <form method="post" id="resumeForm">
        <table width="700" border="0" align="center" cellpadding="0"
               cellspacing="0" id="info" style="border-collapse:separate; border-spacing: 0px 20px;">
            <tr>
                <td width="115">起始日期</td>
                <td>
                    <input type="text" name="start_date"
                           value="{{ $data['start_date'] }}" id="startDate" onClick="WdatePicker()">
                </td>
                <td width="115">结束日期</td>
                <td>
                    <input type="text" name="end_date"
                           value="{{ $data['end_date'] }}" id="endDate" onClick="WdatePicker()">
                </td>
            </tr>
            <tr>
                <td width="115">工作单位</td>
                <td>
                    <input type="text" name="work_place" value='{{ $data['work_place'] }}'>
                </td>
                <td width="115">所在部门</td>
                <td>
                    <input type="text" name="department" value="{{ $data['department'] }}">
                </td>
            </tr>
            <tr>
                <td>职位名称</td>
                <td>
                    <input type="text" name="job_name" value="{{ $data['job_name'] }}">
                </td>
            </tr>
            <tr>
                <td width="115">用工形式</td>
                <td>
                    <select name="work_status">
                        <option selected="selected">-------请选择------</option>
                        <option value="1" @if($data['work_status'] == 1)
                                selected="selected"@endif>正式员工</option>
                        <option value="2" @if($data['work_status'] == 2)
                        selected="selected"@endif>实习生</option>
                        <option value="3" @if($data['work_status'] == 3)
                        selected="selected"@endif>兼职人员</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="115">工作业绩</td>
                <td colspan="3" height="250">
                    <textarea rows="12" cols="60" name="achievement">{{ $data['achievement'] }}</textarea>
                    <input type="hidden" value="{{ $data['id'] }}" name="id">
                </td>

            </tr>
        </table>
    </form>
    <button id="saveButton" class="button">保存</button>
    </body>
</html>