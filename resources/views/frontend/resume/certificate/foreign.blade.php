<div class="main_you2">
    <div class="main_you22_1 title_font">
        <div style="float: left;margin-left: 10px;margin-top: 4px;">外语水平证书</div>
    </div>
    <div>
        <button class="add_button" id="addForeign">继续添加</button>
        <button class="cancel_button" id="cancelForeign">取消添加</button>
    </div>
    <div>
        @if($data['userFn'])
            <table class="table_style">
                <tr>
                    <th>类别</th>
                    <th>资格证书</th>
                    <th>获得日期</th>
                    <th>操作</th>
                </tr>
                @foreach($data['userFn'] as $foreign)
                    <tr>
                        <td>{{ $foreign['foreign_type'] }}</td>
                        <td>
                            {{ $foreign['level_name'] }}
                        </td>
                        <td>{{ $foreign['date'] }}</td>
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
    <div class="main_you22_3" style="display: block">
        <form method="post" id="ForeignForm">
            <table width="700" border="0" align="center" cellpadding="0"
                   cellspacing="0" id="info"
                   style="border-collapse:separate; border-spacing: 0px 20px;">
                <tr>
                    <td width="115">语种</td>
                    <td>
                        <select name="foreign_type_id" id="foreign">
                            <option selected="selected">-------请选择------</option>
                            @foreach($data['foreign'] as $foreign)
                                <option value="{{ $foreign['id'] }}">{{ $foreign['type_name'] }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="115">等级考试</td>
                    <td>
                        <select name="foreign_name_id" id="fn">
                            <option selected="selected">-------请选择------</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="115">考试成绩</td>
                    <td>
                        <input type="text" name="grade" value=''>
                    </td>
                    <td width="115">获得日期</td>
                    <td>
                        <input type="text" name="date" onClick="WdatePicker()">
                    </td>
                </tr>
            </table>
        </form>
        <button id="foreignButton" class="button">保存</button>
    </div>
</div>