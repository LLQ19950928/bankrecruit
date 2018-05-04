<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Backend',
    'prefix' => 'backend'], function () {

    Route::group(['prefix' => 'register'], function () {
          Route::any('register', 'RegisterController@register');
    });

    Route::group(['prefix' => 'login'], function () {
        Route::any('login', 'LoginController@login');
        Route::get('loginout', 'LoginController@loginOut');
    });

    Route::group(['prefix' => 'resume'], function () {

        Route::any('editResumeBaseInfo', 'ResumeController@editResumeBaseInfo');
        Route::any('editEduSituation', 'ResumeController@editEduSituation');
        Route::any('editWorkExperienceInfo', 'ResumeController@editWorkExperienceInfo');
        Route::any('editBonusInfo', 'ResumeController@editBonusInfo');
        Route::any('editFamilyMember', 'ResumeController@editFamilyMember');
        Route::any('editProject', 'ResumeController@editProject');
        Route::any('editEval', 'ResumeController@editEval');


        Route::any('updateEduInfo', 'ResumeController@updateEduInfo');
        Route::any('updateBonusInfo', 'ResumeController@updateBonusInfo');

        Route::any('updateFamilyMember', 'ResumeController@updateFamilyMember');
        Route::any('updateWorkExperience', 'ResumeController@updateWorkExperience');
        Route::any('editUserCertificate', 'ResumeController@editUserCertificate');
        Route::any('editUserForeign', 'ResumeController@editUserForeign');
        Route::any('editEval', 'ResumeController@editEval');
    });


    Route::any('test', 'TestController@test');
});

Route::group(['namespace' => 'Frontend',
    'prefix' => 'frontend'], function () {

    Route::group(['prefix' => 'register'], function () {
        Route::get('display', 'RegisterController@display');
        Route::get('captcha', 'RegisterController@captcha');
    });

    Route::group(['prefix' => 'login'], function () {
        Route::get('display', 'LoginController@display');
    });

    Route::group(['prefix' => 'homepage'], function () {
        Route::get('display', 'HomePageController@display');
    });

    Route::group(['prefix' => 'resume', 'middleware' => 'resume'], function () {

        Route::get('index', 'ResumeController@index');
        Route::get('preview', 'ResumeController@previewResume');
        Route::get('getResumeBaseInfo', 'ResumeController@getResumeBaseInfo');
        Route::get('getEduSituation', 'ResumeController@getEduSituation');
        Route::get('getWorkExperienceInfo', 'ResumeController@getWorkExperienceInfo');
        Route::get('updateWorkExperienceInfo', 'ResumeController@updateWorkExperienceInfo');
        Route::get('getBonusInfo', 'ResumeController@getBonusInfo');
        Route::get('getFamilyMember', 'ResumeController@getFamilyMember');
        Route::get('updateEduInfo', 'ResumeController@updateEduInfo');
        Route::get('updateBonusInfo', 'ResumeController@updateBonusInfo');
        Route::get('updateFamilyMember', 'ResumeController@updateFamilyMember');
        Route::get('previewResume', 'ResumeController@previewResume');
        Route::get('getCertificateInfo', 'ResumeController@getCertificateInfo');
        Route::get('getCertificateName', 'ResumeController@getCertificateName');
        Route::get('getForeignName', 'ResumeController@getForeignName');
        Route::get('getCityName', 'ResumeController@getCityName');
        Route::get('getProject', 'ResumeController@getProject');
        Route::get('getEval', 'ResumeController@getEval');
    });

    Route::group(['prefix' => 'announce'], function () {
        Route::get('getAnnounceInfo', 'AnnounceController@getAnnounceInfo');
        Route::get('getAnnounceDetail', 'AnnounceController@getAnnounceDetail');

    });

    Route::group(['prefix' => 'schoolrecruit'], function () {

        Route::get('getSchoolRecruitInfo', 'SchoolRecruitController@getSchoolRecruitInfo');
        Route::get('getSchoolRecruitDetail', 'SchoolRecruitController@getSchoolRecruitDetail');
    });

    Route::group(['prefix' => 'socialrecruit'], function () {

        Route::get('getSocialRecruitInfo', 'SocialRecruitController@getSocialRecruitInfo');
        Route::get('getSocialRecruitDetail', 'SocialRecruitController@getSocialRecruitDetail');
    });

    Route::group(['prefix' => 'aboutbank'], function () {

        Route::get('getBankInfo', 'AboutBankController@getBankInfo');
    });

    Route::group(['prefix' => 'applyfor', 'middleware' => 'resume'], function () {

        Route::get('applyInfo', 'ApplyForController@applyInfo');
    });
});

    Route::group(['namespace' => 'Admin',
         'prefix' => 'admin'], function () {

       Route::group(['prefix' => 'register'], function () {

           Route::get('display', 'RegisterController@display');
           Route::any('register', 'RegisterController@register');

       });

        Route::group(['prefix' => 'login'], function () {

            Route::any('login', 'LoginController@login');
            Route::get('loginOut', 'LoginController@loginOut');
            Route::get('display', 'LoginController@display');
        });

        Route::group(['prefix' => 'announce'], function () {

            Route::get('getAnnounceInfo', 'AnnounceController@getAnnounceInfo');
            Route::any('editAnnounceInfo', 'AnnounceController@editAnnounceInfo');
            Route::any('updateAnnounceInfo', 'AnnounceController@updateAnnounceInfo');
            Route::any('updateAnnounceStatus', 'AnnounceController@updateAnnounceStatus');
        });

        Route::group(['prefix' => 'schoolrecruit'], function () {

            Route::get('getSchoolRecruitInfo', 'RecruitController@getSchoolRecruitInfo');
            Route::any('editSchoolRecruitInfo', 'RecruitController@editSchoolRecruitInfo');
        });

        Route::group(['prefix' => 'socialrecruit'], function () {

            Route::get('getSocialRecruitInfo', 'RecruitController@getSocialRecruitInfo');
            Route::any('editSocialRecruitInfo', 'RecruitController@editSocialRecruitInfo');
        });

        Route::group(['prefix' => 'apply'], function () {

            Route::any('applyJob', 'ApplyController@applyJob');
            Route::get('getApplyInfo', 'ApplyController@getApplyInfo');
        });

        Route::group(['prefix' => 'aboutbank'], function () {

            Route::any('editBankInfo', 'AboutBankController@editBankInfo');
            Route::get('getBankInfo', 'AboutBankController@getBankInfo');
        });


});



