$(document).ready(function () {
   
    $("#registerButton").click(function () {
       
        $.ajax({
            url: 'http://bank.recruit.cn/backend/register/register',
            dataType: 'json',
            data: $("#form").serialize(),
            success: function (res) {
                if (res.code != 10008) {
                   alert(res.msg);
                }else {
                    window.location.href = 'http://bank.recruit.cn/frontend/login/display';
                }
            }
        })
    });
});