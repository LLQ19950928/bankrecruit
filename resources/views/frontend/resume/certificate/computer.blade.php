<div class="main_you2">
    <div class="main_you22_1 title_font">
        <div style="float: left;margin-left: 10px;margin-top: 4px;">计算机证书</div>
    </div>
    <div>
        <button class="add_button" id="addButton">继续添加</button>
        <button class="cancel_button" id="cancelButton">取消添加</button>
    </div>
    <div>
        @if($data['user'])
            <table class="table_style">
                <tr>
                    <th>类别</th>
                    <th>资格证书</th>
                    <th>获得日期</th>
                    <th>操作</th>
                </tr>
                @foreach($data['user'] as $certificate)
                    <tr>
                        <td>{{ $certificate['certificate_type'] }}</td>
                        <td>
                            {{ $certificate['certificate_name'] }}
                        </td>
                        <td>{{ $certificate['date'] }}</td>
                        <td>
                            <a href="javascript:void(0)">
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
                    <td width="115">类别</td>
                    <td>
                        <select name="certificate_type_id" id="ct">
                            <option selected="selected">-------请选择------</option>
                            @foreach($data['type'] as $certificate)
                                <option value="{{ $certificate['id'] }}">{{ $certificate['type_name'] }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="115">资格证书</td>
                    <td>
                        <select name="certificate_name_id" id="cn">
                            <option selected="selected">-------请选择------</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="115">获得日期</td>
                    <td>
                        <input type="text" name="date" onClick="WdatePicker()">
                    </td>
                </tr>
            </table>
        </form>
        <button id="saveButton" class="button">保存</button>
    </div>
</div>