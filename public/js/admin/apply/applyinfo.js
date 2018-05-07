$(document).ready(function () {

    $("select[name='status']").change(function () {

         $.ajax({
             url: 'http://bank.recruit.cn/admin/apply/updateApplyStatus' +
                '?id=' + $(this).attr('applyId') + '&status=' + $(this).val(),
             dataType: 'json',
             type: 'get',
             success: function (res) {
                 alert(res.msg);
             }
         });
        // alert('hello');
    });
});