$(document).ready(function () {

    $(".navi_resume").addClass('on');


    $("#saveButton").click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/backend/resume/editResumeBaseInfo',
            dataType: 'json',
            type: 'post',
            data: $("#resumeForm").serialize(),
            success: function (res) {
                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    window.location.href = 'http://bank.recruit.cn/frontend/resume/getEduSituation';
                }
            }
        });
    });

    getVal($("#pSelect").val());

    function getVal(value) {

        $.ajax({
            url: 'http://bank.recruit.cn/frontend/resume/getCityName?id=' + value,
            dataType: 'json',
            type: 'get',
            success: function (res) {

                if (res.code == 10003) {
                    alert(res.msg);
                }else {
                    for(var i = 0; i < res.data.length; i++)
                    {
                        if($('#cSelect').attr('city') == res.data[i]['id']) {
                            $('#cSelect').append("<option value='"
                                + res.data[i]['id'] +"' selected='selected'>"
                                + res.data[i]['city_name'] + "</option>");
                        }else {
                            $('#cSelect').append("<option value='"
                                + res.data[i]['id'] +"'>"
                                + res.data[i]['city_name'] + "</option>");
                        }
                    }
                }
            }
        });
    }

    $("#pSelect").change(function () {

        getVal($(this).val());
    });


});