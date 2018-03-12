@extends('layouts.resume')


@section('resumeStyle')
    <script src="/js/frontend/resume/resumebaseinfo.js"></script>
@endsection


@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">简历填写</div>
        </div>
        <div class="main_you22_3">
            <form method="post" id="resumeForm">
                <table width="700" border="0" align="center" cellpadding="0"
                       cellspacing="0" id="info" style="border-collapse:separate; border-spacing: 0px 20px;">
                    <tr>
                        <td width="115">姓&nbsp;&nbsp;&nbsp;名</td>
                        <td>
                            <input type="text" name="name" value="{{ $data['userInfo']['name'] }}">
                        </td>
                        <td width="115">性&nbsp;&nbsp;&nbsp;别</td>
                        <td>
                            <select  name="gender">
                                @if($data['userInfo'])
                                    <option value="1" @if($data['userInfo']['gender'] == '男') selected="selected" @endif>男</option>
                                    <option value="2" @if($data['userInfo']['gender'] == '女') selected="selected" @endif>女</option>
                                @else
                                    <option selected="selected">-------请选择------</option>
                                    <option value="1">男</option>
                                    <option value="2">女</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="115">电子邮箱</td>
                        <td>
                            <input type="text" name="email" value="{{ $data['userInfo']['email'] }}">
                        </td>
                        <td width="115">手机号码</td>
                        <td>
                            <input type="text" name="phone_number" value="{{ $data['userInfo']['phone_number'] }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">婚姻状况</td>
                        <td>
                            <select name="marry">
                                @if($data['userInfo'])
                                    <option value="1" @if($data['userInfo']['marry'] == '未婚') selected="selected" @endif>未婚</option>
                                    <option value="2" @if($data['userInfo']['marry'] == '已婚') selected="selected" @endif>已婚</option>
                                    <option value="3" @if($data['userInfo']['marry'] == '离异') selected="selected" @endif>离异</option>
                                    <option value="4" @if($data['userInfo']['marry'] == '其它') selected="selected" @endif>其它</option>
                                @else
                                    <option selected="selected">-------请选择------</option>
                                    <option value="1">未婚</option>
                                    <option value="2">已婚</option>
                                    <option value="3">离异</option>
                                    <option value="4">其它</option>
                                @endif
                            </select>
                        </td>
                        <td width="115">民族</td>
                        <td>
                            <select name="nation" id="nation">
                                <option selected="selected">-------请选择------</option>
                                @foreach($data['nation'] as $nation)
                                    @if($data['userInfo']['nation'] == $nation['nation'])
                                        <option value="{{ $nation['id'] }}" selected="selected">{{ $nation['nation'] }}</option>
                                    @else
                                        <option value="{{ $nation['id'] }}">{{ $nation['nation'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="115">证件类型</td>
                        <td width="120">
                            <select name="id_type">
                                @if($data['userInfo'])
                                    <option value="1" @if($data['userInfo']['id_type'] == '身份证') selected="selected" @endif>身份证</option>
                                    <option value="2" @if($data['userInfo']['id_type'] == '护照') selected="selected" @endif>护照</option>
                                    <option value="3" @if($data['userInfo']['id_type'] == '军官照') selected="selected" @endif>军官证</option>
                                    <option value="4" @if($data['userInfo']['id_type'] == '港澳通行证') selected="selected" @endif>港澳通行证</option>
                                    <option value="5" @if($data['userInfo']['id_type'] == '台胞通行证') selected="selected" @endif>台胞通行证</option>
                                    <option value="6" @if($data['userInfo']['id_type'] == '其它') selected="selected" @endif>其它</option>
                                @else
                                    <option selected="selected">-------请选择------</option>
                                    <option value="1">身份证</option>
                                    <option value="2">护照</option>
                                    <option value="3">军官证</option>
                                    <option value="4">港澳通行证</option>
                                    <option value="5">台胞通行证</option>
                                    <option value="6">其它</option>
                                @endif
                            </select>
                        </td>
                        <td>证件号码</td>
                        <td>
                            <input type="text" name="id_number" value="{{ $data['userInfo']['id_number'] }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">政治面貌</td>
                        <td>
                            <select name="political_status" id="polity">
                                @if($data['userInfo'])
                                    <option value="1" @if($data['userInfo']['political_status'] == '中共党员') selected="selected" @endif>中共党员</option>
                                    <option value="2" @if($data['userInfo']['political_status'] == '共青团员') selected="selected" @endif>共青团员</option>
                                    <option value="3" @if($data['userInfo']['political_status'] == '民主党派') selected="selected" @endif>民主党派</option>
                                    <option value="4" @if($data['userInfo']['political_status'] == '群众') selected="selected" @endif>群众</option>
                                @else
                                    <option selected="selected">-------请选择------</option>
                                    <option value="1">中共党员</option>
                                    <option value="2">共青团员</option>
                                    <option value="3">民主党派</option>
                                    <option value="4">群众</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="115">籍贯</td>
                        <td>
                            <input type="text" name="place_of_origin" value="{{ $data['userInfo']['place_of_origin'] }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">联系地址</td>
                        <td>
                            <input type="text" name="current_address" style="width: 350px"
                                   value="{{ $data['userInfo']['current_address'] }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">家庭地址</td>
                        <td>
                            <input type="text" name="family_at"
                                   style="width: 350px" value="{{ $data['userInfo']['family_at'] }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">健康状况</td>
                        <td>
                            <select name="healthy_status">
                                @if($data['userInfo'])
                                    <option value="1" @if($data['userInfo']['healthy_status'] == '未婚') selected="selected" @endif>良好</option>
                                    <option value="2" @if($data['userInfo']['healthy_status'] == '已婚') selected="selected" @endif>一般</option>
                                    <option value="3" @if($data['userInfo']['healthy_status'] == '离异') selected="selected" @endif>较差</option>
                                @else
                                    <option selected="selected">-------请选择------</option>
                                    <option value="1">良好</option>
                                    <option value="2">一般</option>
                                    <option value="3">较差</option>
                                @endif
                            </select>
                        </td>
                        <td>身高（cm）</td>
                        <td>
                            <input type="text" name="height" value="{{ $data['userInfo']['height'] }}">
                        </td>
                    <tr/>
                    <tr>
                        <td width="115">出生时间</td>
                        <td>
                            <input type="text" id="broth"
                                   name="broth_at" value="{{ $data['userInfo']['broth_at'] }}" onClick="WdatePicker()">
                        </td>
                        <td width="115">毕业时间</td>
                        <td>
                            <input type="text" id="graduate" name="graduate_at"
                                   value="{{ $data['userInfo']['graduate_at'] }}" onClick="WdatePicker()">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="main22_4">
            <button id="saveButton" class="button">保存并下一步</button>
        </div>
    </div>
@endsection



