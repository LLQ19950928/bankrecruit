$(document).ready(function () {

    $(".navi_education").addClass('on');

    $("#addButton").click(function () {

        var css = $(".main_you22_3").css('display');
        if(css == 'none') {
            $(".main_you22_3").show();
        }else {
            alert('请先保存教育信息');
        }


    });

    $("#saveButton").click(function () {

        $.ajax({
            url: 'http://bank.schoolrecruit.cn/backend/resume/editWorkExperienceInfo',
            dataType: 'json',
            type: 'post',
            data: $("#resumeForm").serialize(),
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    alert('操作成功');
                    window.location.href = '';
                }
            }
        });
    });


});