$(document).ready(function () {

    $('#saveButton').click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/backend/resume/updateWorkExperience',
            dataType: 'json',
            type: 'post',
            data: $("#resumeForm").serialize(),
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    alert('修改成功');
                    window.location.href = '';
                }
            }
        });
    });
});