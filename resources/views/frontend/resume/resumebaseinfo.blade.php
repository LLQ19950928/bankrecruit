@extends('layouts.resume')


@section('resumeStyle')
    <script src="/js/frontend/resume/resumebaseinfo.js"></script>
    {{--<script type="text/javascript">--}}
        {{--//图片上传预览    IE是用了滤镜。--}}
        {{--function previewImage(file)--}}
        {{--{--}}
            {{--var MAXWIDTH  = 120;--}}
            {{--var MAXHEIGHT = 150;--}}
            {{--var div = document.getElementById('preview');--}}
            {{--if (file.files && file.files[0])--}}
            {{--{--}}
                {{--div.innerHTML ='<img id=imghead onclick=$("#previewImg").click()>';--}}
                {{--var img = document.getElementById('imghead');--}}
                {{--img.onload = function(){--}}
                    {{--var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);--}}
                    {{--img.width  =  rect.width;--}}
                    {{--img.height =  rect.height;--}}
{{--//                 img.style.marginLeft = rect.left+'px';--}}
                    {{--img.style.marginTop = rect.top+'px';--}}
                {{--}--}}
                {{--var reader = new FileReader();--}}
                {{--reader.onload = function(evt){img.src = evt.target.result;}--}}
                {{--reader.readAsDataURL(file.files[0]);--}}
            {{--}--}}
            {{--else //兼容IE--}}
            {{--{--}}
                {{--var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';--}}
                {{--file.select();--}}
                {{--var src = document.selection.createRange().text;--}}
                {{--div.innerHTML = '<img id=imghead>';--}}
                {{--var img = document.getElementById('imghead');--}}
                {{--img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;--}}
                {{--var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);--}}
                {{--status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);--}}
                {{--div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";--}}
            {{--}--}}
        {{--}--}}
        {{--function clacImgZoomParam( maxWidth, maxHeight, width, height ){--}}
            {{--var param = {top:0, left:0, width:width, height:height};--}}
            {{--if( width>maxWidth || height>maxHeight ){--}}
                {{--rateWidth = width / maxWidth;--}}
                {{--rateHeight = height / maxHeight;--}}

                {{--if( rateWidth > rateHeight ){--}}
                    {{--param.width =  maxWidth;--}}
                    {{--param.height = Math.round(height / rateWidth);--}}
                {{--}else{--}}
                    {{--param.width = Math.round(width / rateHeight);--}}
                    {{--param.height = maxHeight;--}}
                {{--}--}}
            {{--}--}}
            {{--param.left = Math.round((maxWidth - param.width) / 2);--}}
            {{--param.top = Math.round((maxHeight - param.height) / 2);--}}
            {{--return param;--}}
        {{--}--}}
    {{--</script>--}}
    <style>
        .select2 {
            width: 90px;
            padding: 5px 3px;
            margin-right: 4px;
        }
    </style>
@endsection


@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">简历填写</div>
        </div>
        <div class="main_you22_3">
            <form method="post" id="resumeForm" enctype="multipart/form-data">
                <table width="700" border="0" align="center" cellpadding="0"
                       cellspacing="0" id="info" style="border-collapse:separate; border-spacing: 0px 20px;">
                    {{--<tr>--}}
                        {{--<div id="addCommodityIndex">--}}
                            {{--<div class="input-group row">--}}
                                {{--<div class="col-sm-9 big-photo">--}}
                                    {{--<div id="preview">--}}
                                        {{--<img id="imghead" border="0" src="/image/photo_icon.png"--}}
                                             {{--width="120" height="150" onclick="$('#previewImg').click();">--}}
                                    {{--</div>--}}
                                    {{--<input type="file" style="display: none"--}}
                                           {{--id="previewImg" name="photo" onchange="previewImage(this)">--}}
                                    {{--<span style="padding-top: 10px">图片上传</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</tr>--}}
                    <tr>
                        <td width="115">姓&nbsp;&nbsp;&nbsp;名</td>
                        <td>
                            <input type="text" name="name" value="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['name'] }}">
                        </td>
                        <td width="115">性&nbsp;&nbsp;&nbsp;别</td>
                        <td>
                            <select  name="gender">
                                @if($data['userInfo'])
                                    <option value="1" @if($data['userInfo'] != null && $data['userInfo']['gender'] == '男') selected="selected" @endif>男</option>
                                    <option value="2" @if($data['userInfo'] != null && $data['userInfo']['gender'] == '女') selected="selected" @endif>女</option>
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
                            <input type="text" name="email"
                                   value="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['email'] }}">
                        </td>
                        <td width="115">手机号码</td>
                        <td>
                            <input type="text" name="phone_number"
                                   value="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['phone_number'] }}">
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
                                    @if($data['userInfo'] != null && $data['userInfo']['nation'] == $nation['nation'])
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
                            <input type="text" name="id_number" value="{{ $data['userInfo'] == null ?
                            '' : $data['userInfo']['id_number'] }}">
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
                            <select class="select2" name="province" id="pSelect">
                                <option value="0">请选择</option>
                                @foreach($data['province'] as $province)
                                    @if($data['userInfo'] != null && $province['id'] == $data['userInfo']['p_id'])
                                        <option value="{{ $province['id'] }}" selected="selected">
                                            {{ $province['province_name'] }}
                                        </option>
                                    @else
                                        <option value="{{ $province['id'] }}">
                                            {{ $province['province_name'] }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <select class="select2" name="city" id="cSelect"
                                    city="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['c_id'] }}">
                                <option>请选择</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="115">联系地址</td>
                        <td>
                            <input type="text" name="current_address" style="width: 350px"
                                   value="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['current_address'] }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="115">家庭地址</td>
                        <td>
                            <input type="text" name="family_at"
                                   style="width: 350px" value="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['family_at'] }}">
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
                            <input type="text" name="height" value="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['height'] }}">
                        </td>
                    <tr/>
                    <tr>
                        <td width="115">出生时间</td>
                        <td>
                            <input type="text" id="broth"
                                   name="broth_at" value="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['broth_at'] }}" onClick="WdatePicker()">
                        </td>
                        <td width="115">体重（kg）</td>
                        <td>
                            <input type="text" name="weight"
                                   value="{{ $data['userInfo'] ==  null ? '' : $data['userInfo']['weight'] }}">
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



