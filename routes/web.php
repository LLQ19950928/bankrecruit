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

        Route::any('update', 'ResumeController@updateUserEducation');
        Route::any('editlang', 'ResumeController@editUserForeignLanguage');
        Route::any('updatelang', 'ResumeController@updateUserForeignLanguage');
        Route::any('editcredit', 'ResumeController@editUserCredit');

        Route::any('updatebonus', 'ResumeController@updateUserBonus');

        Route::any('editpunishment', 'ResumeController@editUserPunishment');
        Route::any('updatepunishment', 'ResumeController@updateUserPunishment');


        Route::any('updatefamily', 'ResumeController@updateFamilyMember');
    });

    Route::group(['prefix' => 'json'], function () {
        Route::get('nation', 'JsonController@acquireNationInfo');
        Route::get('polity', 'JsonController@acquirePolityInfo');
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

    Route::group(['prefix' => 'resume'], function () {

        Route::get('index', 'ResumeController@index');
        Route::get('preview', 'ResumeController@previewResume');
        Route::get('getResumeBaseInfo', 'ResumeController@getResumeBaseInfo');
        Route::get('getEduSituation', 'ResumeController@getEduSituation');
        Route::get('getWorkExperienceInfo', 'ResumeController@getWorkExperienceInfo');
        Route::get('getBonusInfo', 'ResumeController@getBonusInfo');
        Route::get('getFamilyMember', 'ResumeController@getFamilyMember');

        Route::get('appointededu', 'ResumeController@displayAppointedUserEducation');
        Route::get('acquiresn', 'ResumeController@acquireSchoolName');
        Route::get('lang', 'ResumeController@displayUserForeignLanguages');
        Route::get('appointedlang', 'ResumeController@displayAppointedUserForeignLanguages');
        Route::get('acquirece', 'ResumeController@acquireCertificate');
        Route::get('credit', 'ResumeController@displayUserCredit');
        Route::get('appointedbonus', 'ResumeController@displayAppointedUserBonus');
        Route::get('punishment', 'ResumeController@displayUserPunishment');
        Route::get('appointedpunishment', 'ResumeController@displayAppointedUserPunishment');
        Route::get('familymember', 'ResumeController@displayFamilyMember');
        Route::get('appointedfamilymember', 'ResumeController@displayAppointedFamilyMember');
    });

    Route::group(['prefix' => 'announce'], function () {
        Route::get('getAnnounceInfo', 'AnnounceController@getAnnounceInfo');
        Route::get('getAnnounceDetail', 'AnnounceController@getAnnounceDetail');

    });

    Route::group(['prefix' => 'schoolrecruit'], function () {

        Route::get('getSchoolRecruitInfo', 'SchoolRecruitController@getSchoolRecruitInfo');
        Route::get('getSchoolRecruitDetail', 'SchoolRecruitController@getSchoolRecruitDetail');
    });

    Route::group(['prefix' => 'aboutbank'], function () {

        Route::get('getBankInfo', 'AboutBankController@getBankInfo');
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
        });

        Route::group(['prefix' => 'schoolrecruit'], function () {

            Route::get('getSchoolRecruitInfo', 'RecruitController@getSchoolRecruitInfo');
            Route::any('editSchoolRecruitInfo', 'RecruitController@editSchoolRecruitInfo');
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



