@extends('layouts.resume')

@section('resumeStyle')
    <link rel="stylesheet" href="/css/common/resume.css">
    <link rel="stylesheet" href="/layer/mobile/need/layer.css">
    <script src="/layer/layer.js"></script>
    <script src="/js/frontend/resume/familymember.js"></script>
@endsection

@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">家庭成员信息</div>
        </div>
        <div>
            <button class="add_button" id="addButton">继续添加</button>
        </div>
        <div>
            @if($data)
                <table class="table_style">
                    <tr>
                        <th>姓名</th>
                        <th>工作单位</th>
                        <th>联系电话</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $family)
                        <tr>
                            <td>{{ $family['name'] }}</td>
                            <td>{{ $family['company'] }}</td>
                            <td>{{ $family['phone_number'] }}</td>
                            <td>
                                <a href="javascript:void(0)"
                                   onclick="updateMember(
                                       'http://bank.recruit.cn/frontend/resume/updateFamilyMember?id={{ $family['id'] }}')">
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
                        <td width="115">姓名</td>
                        <td>
                            <input type="text" name="name" value="">
                        </td>
                        <td width="115">家庭称谓</td>
                        <td>
                            <select name="call">
                                <option selected="selected">-------请选择------</option>
                                <option value="1">父亲</option>
                                <option value="2">母亲</option>
                                <option value="3">兄弟姐妹</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="115">工作单位</td>
                        <td>
                            <input type="text" name="company" value=''>
                        </td>
                        <td width="115">职务</td>
                        <td>
                            <input type="text" name="job" value="">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">手机号码</td>
                        <td>
                            <input type="text" name="phone_number" value=''>
                        </td>
                    </tr>
                </table>
            </form>
            <button id="saveButton" class="button">保存</button>
        </div>
    </div>
    <script type="application/javascript">
        function updateMember(url) {

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