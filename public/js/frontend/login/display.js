$("#loginButton").click(function () {

     $.ajax({
         url: 'http://bank.recruit.blade.php.cn/backend/login/login',
         dataType: 'json',
         type: 'post',
         data: $('#loginForm').serialize(),
         success: function (res) {
             if (res.code != 200) {
                 alert(res.data);
             }else {
                 window.location.href = '';
             }
         }
     })
});