$(document).ready(function () {

     $('.navi_resume').click(function () {

         $('#introduction').css('display', 'block');
         $('#culture').css('display', 'none');
         $('#train').css('display', 'none');
     });

    $('.navi_education').click(function () {

        $('#introduction').css('display', 'none');
        $('#culture').css('display', 'block');
        $('#train').css('display', 'none');
    });

    $('.navi_work_experience').click(function () {

        $('#introduction').css('display', 'none');
        $('#culture').css('display', 'none');
        $('#train').css('display', 'block');
    });

});