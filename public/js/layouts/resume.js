$(document).ready(function () {

    $('.navi_resume').click(function () {
        window.location.href = 'http://bank.recruit.cn/frontend/resume/getResumeBaseInfo';
    });

    $('.navi_education').click(function () {
        window.location.href = 'http://bank.recruit.cn/frontend/resume/getEduSituation';
    });

    $('.navi_work_experience').click(function () {
        window.location.href = 'http://bank.recruit.cn/frontend/resume/getWorkExperienceInfo';
    });

    $('.navi_bonus').click(function () {
        window.location.href = 'http://bank.recruit.cn/frontend/resume/getBonusInfo';
    });

    $('.navi_family').click(function () {
        window.location.href = 'http://bank.recruit.cn/frontend/resume/getFamilyMember';
    });

    $('.navi_certificate').click(function () {
        window.location.href = 'http://bank.recruit.cn/frontend/resume/getCertificateInfo';
    });

    $('.navi_project').click(function () {
       window.location.href = 'http://bank.recruit.cn/frontend/resume/getProject';
    });
});