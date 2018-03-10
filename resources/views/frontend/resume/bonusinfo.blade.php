@extends('layouts.resume')

@section('resumeStyle')
    <link rel="stylesheet" href="/css/common/resume.css">
    <script src="/js/frontend/resume/bonusinfo.js"></script>
@endsection

@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">奖励情况</div>
        </div>
        <div>
            <button class="add_button" id="addButton">继续添加</button>
        </div>
        <div>
            @if($data)
                <table class="table_style">
                    <tr>
                        <th>奖励时间</th>
                        <th>奖励名称</th>
                        <th>颁奖单位</th>
                        <th>奖励类别</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $bonus)
                        <tr>
                            <td>{{ $bonus['bonus_date'] }}</td>
                            <td>{{ $bonus['bonus_name'] }}</td>
                            <td>{{ $bonus['bonus_company'] }}</td>
                            <td>{{ $bonus['bonus_type'] }}</td>
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
                        <td width="115">受到奖励的时间</td>
                        <td>
                            <input type="text" name="bonus_date" value="" id="bonusDate">
                        </td>
                        <td width="115">奖励类别</td>
                        <td>
                            <select name="bonus_type">
                                <option selected="selected">-------请选择------</option>
                                <option value="1">校内</option>
                                <option value="2">校外</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="115">奖励名称</td>
                        <td>
                            <input type="text" name="bonus_name" value=''>
                        </td>
                        <td width="115">颁奖单位</td>
                        <td>
                            <input type="text" name="bonus_company" value="">
                        </td>
                    </tr>
                </table>
            </form>
            <button id="saveButton" class="button">保存</button>
        </div>
    </div>
@endsection