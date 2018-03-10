$("#loginButton").click(function () {

     $.ajax({
         url: 'http://bank.recruit.cn/backend/login/login',
         dataType: 'json',
         type: 'post',
         data: $('#loginForm').serialize(),
         success: function (res) {
             if (res.code != 201) {
                 alert(res.msg);
             }else {
                 window.location.href = 'http://bank.recruit.cn/frontend/homepage/display';
             }
         }
     });
});

$("#changeCaptcha").click(function () {

    $("#image").attr('src', 'http://bank.recruit.cn/frontend/register/captcha?r='
        + Math.random());
});