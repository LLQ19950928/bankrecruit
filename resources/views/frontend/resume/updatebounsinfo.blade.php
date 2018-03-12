<html>
    <head>
        <link rel="stylesheet" href="/css/layouts/resume.css">
        <link rel="stylesheet" href="/layer/mobile/need/layer.css">
        <link rel="stylesheet" href="/css/frontend/resume/updateinfo.css">
        <script src="/layer/layer.js"></script>
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/frontend/resume/updatebonus.js"></script>
        <script src="/My97DatePicker/WdatePicker.js"></script>
    </head>
    <body>
    <form method="post" id="resumeForm">
        <table width="700" border="0" align="center" cellpadding="0"
               cellspacing="0" id="info" style="border-collapse:separate; border-spacing: 0px 20px;">
            <tr>
                <td width="115">受到奖励的时间</td>
                <td>
                    <input type="text" name="bonus_date"
                           value="{{ $data['bonus_date'] }}"
                           id="bonusDate"  onClick="WdatePicker()">
                </td>
                <td width="115">奖励类别</td>
                <td>
                    <select name="bonus_type">
                        <option selected="selected">-------请选择------</option>
                        <option value="1" @if($data['bonus_type'] == '校内')
                                selected="selected" @endif>校内</option>
                        <option value="2" @if($data['bonus_type'] == '校外')
                        selected="selected" @endif>校外</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="115">奖励名称</td>
                <td>
                    <input type="text" name="bonus_name" value='{{ $data['bonus_name'] }}'>
                </td>
                <td width="115">颁奖单位</td>
                <td>
                    <input type="text" name="bonus_company" value="{{ $data['bonus_company'] }}">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                    <button type="button"
                            class="input_submit" id="myButton">提交</button>
                </td>
            </tr>
        </table>
    </form>
    </body>
</html>