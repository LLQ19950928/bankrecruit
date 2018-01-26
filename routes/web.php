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

    Route::group(['prefix' => 'resume', 'middleware' => 'resume'], function () {

        Route::any('high', 'ResumeController@editUserHighestEducation');
        Route::any('editedu', 'ResumeController@editUserEducation');
        Route::any('editinfo', 'ResumeController@editUserInfo');
        Route::any('update', 'ResumeController@updateUserEducation');
        Route::any('editlang', 'ResumeController@editUserForeignLanguage');
        Route::any('updatelang', 'ResumeController@updateUserForeignLanguage');
        Route::any('editcredit', 'ResumeController@editUserCredit');
        Route::any('editbonus', 'ResumeController@editUserBonus');
        Route::any('updatebonus', 'ResumeController@updateUserBonus');

        Route::any('editpunishment', 'ResumeController@editUserPunishment');
        Route::any('updatepunishment', 'ResumeController@updateUserPunishment');

        Route::any('editfamily', 'ResumeController@editFamilyMember');
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
    });

    Route::group(['prefix' => 'login'], function () {
        Route::get('display', 'LoginController@display');
    });

    Route::group(['prefix' => 'homepage'], function () {
        Route::get('display', 'HomePageController@display');
    });

    Route::group(['prefix' => 'resume', 'middleware' => 'resume'], function () {
        Route::get('index', 'ResumeController@index');
        Route::get('edit', 'ResumeController@editResume');
        Route::get('preview', 'ResumeController@previewResume');
        Route::get('info', 'ResumeController@displayUserInfo');
        Route::get('education', 'ResumeController@displayUserEducation');
        Route::get('appointededu', 'ResumeController@displayAppointedUserEducation');
        Route::get('acquiresn', 'ResumeController@acquireSchoolName');
        Route::get('lang', 'ResumeController@displayUserForeignLanguages');
        Route::get('appointedlang', 'ResumeController@displayAppointedUserForeignLanguages');
        Route::get('acquirece', 'ResumeController@acquireCertificate');
        Route::get('credit', 'ResumeController@displayUserCredit');
        Route::get('bonus', 'ResumeController@displayUserBonus');
        Route::get('appointedbonus', 'ResumeController@displayAppointedUserBonus');
        Route::get('punishment', 'ResumeController@displayUserPunishment');
        Route::get('appointedpunishment', 'ResumeController@displayAppointedUserPunishment');
        Route::get('familymember', 'ResumeController@displayFamilyMember');
        Route::get('appointedfamilymember', 'ResumeController@displayAppointedFamilyMember');
    });
});




