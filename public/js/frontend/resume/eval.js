$(document).ready(function () {

    $(".navi_evaluation").addClass('on');



    $("#saveButton").click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/backend/resume/editEval',
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