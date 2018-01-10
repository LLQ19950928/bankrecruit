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
        Route::any('editcredit', 'ResumeController@editCredit');
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

    Route::group(['prefix' => 'resume', 'middleware' => 'resume'], function () {
        Route::get('edit', 'ResumeController@editResume');
        Route::get('preview', 'ResumeController@previewResume');
        Route::get('info', 'ResumeController@displayUserInfo');
        Route::get('education', 'ResumeController@displayUserEducation');
        Route::get('appointededu', 'ResumeController@displayAppointedUserEducation');
        Route::get('acquiresn', 'ResumeController@acquireSchoolName');
        Route::get('lang', 'ResumeController@displayUserForeignLanguages');
        Route::get('appointedlang', 'ResumeController@displayAppointedUserForeignLanguages');
        Route::get('acquirece', 'ResumeController@acquireCertificate');

    });
});




