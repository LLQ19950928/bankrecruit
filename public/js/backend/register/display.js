$(document).ready(function () {
   
    $("#registerButton").click(function () {
       
        $.ajax({
            url: 'http://bank.recruit.cn/frontend/register/register',
            dataType: 'json',
            data: $("#form").serialize(),
            success: function (res) {
                if (res.code != 200) {
                   alert(res.data);
                }else {
                    window.location.href = '';
                }
            }
        })
    });
});