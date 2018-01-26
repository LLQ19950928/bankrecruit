$(document).ready(function () {

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#brothAt').fdatepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.update(newDate);
        }
        checkin.hide();
        $('#brothAt')[0].focus();
    }).data('datepicker');


    $.ajax({
        url: 'http://bank.recruit.cn/backend/json/nation',
        dataType: 'json',
        type: 'get',
        success: function (res) {

            new Vue({
                el: '#nation',
                data: {
                    nationData: res.data
                }
            });

        }
    });

    $.ajax({
        url: 'http://bank.recruit.cn/backend/json/polity',
        dataType: 'json',
        type: 'get',
        success: function (res) {

            new Vue({
                el: '#polity',
                data: {
                    polityData: res.data
                }
            });
        }
    });

    $("#saveButton").click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/backend/resume/editinfo',
            dataType: 'json',
            type: 'post',
            data: $("#resumeForm").serialize(),
            success: function (res) {
                if (res.code != 200) {
                    alert(res.message);
                }else {
                    window.location.href = '';
                }
            }
        });
    });

});
