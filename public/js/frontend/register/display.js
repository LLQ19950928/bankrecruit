$(document).ready(function () {
   
    $("#registerButton").click(function () {
       
        $.ajax({
            url: 'http://bank.schoolrecruit.cn/backend/register/register',
            dataType: 'json',
            data: $("#form").serialize(),
            success: function (res) {
                if (res.code != 10008) {
                   alert(res.msg);
                }else {
                    window.location.href = 'http://bank.schoolrecruit.cn/frontend/login/display';
                }
            }
        })
    });

    $("#changeCaptcha").click(function () {

        $("#image").attr('src', 'http://bank.schoolrecruit.cn/frontend/register/captcha?r='
            + Math.random());
    });
});