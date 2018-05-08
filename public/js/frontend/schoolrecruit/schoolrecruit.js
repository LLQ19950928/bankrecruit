$(document).ready(function () {

    $('#searchBtn').click(function () {

        $("#tableData tr:gt(0)").remove();
        $.ajax({
            url: 'http://bank.recruit.cn/frontend/schoolrecruit/getDesignatedInfo?id='
            + $('#provinceId').val(),
            dataType: 'json',
            type: 'get',
            success: function (res) {

                // alert(res.data.length);
                var data = '';
                for(var i = 0; i < res.data.length; i++)
                {
                    data += "<tr><td>" + res.data[i]['company']
                        + "</td><td>" + res.data[i]['job_name']
                        + "</td><td>" + res.data[i]['work_place']
                        + "</td><td>" + res.data[i]['number']
                        + "</td><td>" + res.data[i]['end_at']
                        + "</td><td><a href='http://bank.recruit.cn/frontend/schoolrecruit/getSchoolRecruitDetail?id="
                        + res.data[i]['id'] + "'>查看详情</a></td></tr>";
                }
                $('#tableData').append(data);
            }
        });
    });
});