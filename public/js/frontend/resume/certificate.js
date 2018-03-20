$(document).ready(function () {

    $(".navi_certificate").addClass('on');

    $("#addButton").click(function () {

        var css = $(".main_you22_3").css('display');
        if(css == 'none') {
            $(".main_you22_3").show();
        }else {
            alert('请先保存证书信息');
        }

    });

    $('#cancelButton').click(function () {

        $(".main_you22_3").hide();
    });


    $("#ct").change(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/frontend/resume/getCertificateName?id=' + $(this).val(),
            dataType: 'json',
            type: 'get',
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                   for(var i = 0; i < res.data.length; i++)
                   {
                       $('#cn').append("<option value='"
                           + res.data[i]['type_id'] +"'>"
                           + res.data[i]['certificate_name'] + "</option>");
                   }
                }
            }
        });
    });

    $('#foreign').change(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/frontend/resume/getForeignName?id=' + $(this).val(),
            dataType: 'json',
            type: 'get',
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    for(var i = 0; i < res.data.length; i++)
                    {
                        $('#fn').append("<option value='"
                            + res.data[i]['type_id'] +"'>"
                            + res.data[i]['level_name'] + "</option>");
                    }
                }
            }
        });

    });

    $('#saveButton').click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/backend/resume/editUserCertificate',
            dataType: 'json',
            type: 'post',
            data: $('#resumeForm').serialize(),
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    alert('添加成功');
                    window.location.href = '';
                }
            }
        });
    });

    $('#foreignButton').click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/backend/resume/editUserForeign',
            dataType: 'json',
            type: 'post',
            data: $('#ForeignForm').serialize(),
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    alert('添加成功');
                    window.location.href = '';
                }
            }
        });
    });
});