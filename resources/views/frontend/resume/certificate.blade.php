@extends('layouts.resume')

@section('resumeStyle')
    <link rel="stylesheet" href="/css/common/resume.css">
    <link rel="stylesheet" href="/layer/mobile/need/layer.css">
    <script src="/layer/layer.js"></script>
    <script src="/js/frontend/resume/certificate.js"></script>
@endsection

@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">计算机证书</div>
        </div>
        <div>
            <button class="add_button" id="addButton">继续添加</button>
            <button class="cancel_button" id="cancelButton">取消添加</button>
        </div>
        <div class="main_you22_3" style="display: block">
            <form method="post" id="resumeForm">
                <table width="700" border="0" align="center" cellpadding="0"
                       cellspacing="0" id="info" style="border-collapse:separate; border-spacing: 0px 20px;">
                    <tr>
                        <td width="115">类别</td>
                        <td>
                            <select name="certificate_type_id" id="ct">
                                <option selected="selected">-------请选择------</option>
                                @foreach($data as $certificate)
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
@endsection