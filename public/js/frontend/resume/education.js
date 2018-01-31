$(document).ready(function () {

    $("#entranceTime").fdatepicker();
    $("#graduationTime").fdatepicker();

    $("#schoolLocation").change(function () {

         $.ajax({
            url: 'http://bank.recruit.cn/frontend/resume/acquiresn?locationId=' + $(this).val(),
            dataType: 'json',
            success: function (res) {


            }
         });
    });

    $("#saveButton").click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/backend/resume/editinfo',
            dataType: 'json',
            type: 'post',
            data: $("#resumeForm").serialize(),
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    alert('操作成功');
                }
            }
        });
    });

});