$(document).ready(function () {

    $(".navi_project").addClass('on');

    $("#addButton").click(function () {

        var css = $(".main_you22_3").css('display');
        if(css == 'none') {
            $(".main_you22_3").show();
        }else {
            alert('请先保存信息');
        }


    });

    $("#saveButton").click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/backend/resume/editProject',
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