$(document).ready(function () {

    $(".navi_resume").addClass('on');


    $("#saveButton").click(function () {

        $.ajax({
            url: 'http://bank.schoolrecruit.cn/backend/resume/editResumeBaseInfo',
            dataType: 'json',
            type: 'post',
            data: $("#resumeForm").serialize(),
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    window.location.href = 'http://bank.schoolrecruit.cn/frontend/resume/getEduSituation';
                }
            }
        });
    });

});