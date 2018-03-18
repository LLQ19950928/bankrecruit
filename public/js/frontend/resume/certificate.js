$(document).ready(function () {

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
                }
            }
        });
    });
});