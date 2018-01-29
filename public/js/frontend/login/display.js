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
     })
});