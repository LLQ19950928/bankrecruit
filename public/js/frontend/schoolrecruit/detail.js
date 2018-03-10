$(document).ready(function () {

    $("#applyBtn").click(function () {

        $.ajax({
            url: 'http://bank.schoolrecruit.cn/admin/apply/applyJob',
            dataType: 'json',
            type: 'post',
            data: $("#applyForm").serialize(),
            success: function (res) {
                if (res.code != 200) {
                    alert(res.msg);
                }else {
                    alert('申请成功');
                    window.location.href = 'http://bank.schoolrecruit.cn/frontend/schoolrecruit/getSchoolRecruitInfo';
                }
            }
        });
    });
});