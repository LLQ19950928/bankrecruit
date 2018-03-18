$(document).ready(function () {

    $("#applyBtn").click(function () {

        if(!$(this).attr('username')) {
            alert('请先登录');
        }else {
            $.ajax({
                url: 'http://bank.recruit.cn/admin/apply/applyJob',
                dataType: 'json',
                type: 'post',
                data: $("#applyForm").serialize(),
                success: function (res) {
                    if (res.code != 200) {
                        alert(res.msg);
                    }else {
                        alert('申请成功');
                        window.location.href = 'http://bank.recruit.cn/frontend/schoolrecruit/getSchoolRecruitInfo';
                    }
                }
            });
        }

    });
});