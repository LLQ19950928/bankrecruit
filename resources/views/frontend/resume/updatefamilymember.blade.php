<html>
    <head>
        <link rel="stylesheet" href="/css/layouts/resume.css">
        <link rel="stylesheet" href="/layer/mobile/need/layer.css">
        <script src="/layer/layer.js"></script>
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/frontend/resume/updatemember.js"></script>
        <script src="/My97DatePicker/WdatePicker.js"></script>
    </head>
    <body>
    <div class="main_you22_3">
        <form method="post" id="resumeForm">
            <table width="700" border="0" align="center" cellpadding="0"
                   cellspacing="0" id="info" style="border-collapse:separate;
                   border-spacing: 0px 20px;">
                <tr>
                    <td width="115">姓名</td>
                    <td>
                        <input type="text" name="name" value="{{ $data['name'] }}">
                    </td>
                    <td width="115">家庭称谓</td>
                    <td>
                        <select name="call">
                            <option selected="selected">-------请选择------</option>
                            <option value="1" @if($data['call'] == 1)
                                    selected="selected" @endif>父亲</option>
                            <option value="2" @if($data['call'] == 2)
                                    selected="selected" @endif>母亲</option>
                            <option value="3" @if($data['call'] == 3)
                                    selected="selected" @endif>兄弟姐妹</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="115">工作单位</td>
                    <td>
                        <input type="text" name="company" value="{{ $data['company'] }}">
                    </td>
                    <td width="115">职务</td>
                    <td>
                        <input type="text" name="job" value="{{ $data['job'] }}">
                    </td>
                </tr>
                <tr>
                    <td width="115">手机号码</td>
                    <td>
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <input type="text" name="phone_number" value="{{ $data['phone_number'] }}">
                    </td>
                </tr>
            </table>
        </form>
        <button id="saveButton" class="button">保存</button>
    </div>
    </body>
</html>