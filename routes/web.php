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
        Route::any('editusereducation', 'ResumeController@editUserEducation');
        Route::any('edituserinfo', 'ResumeController@editUserInfo');
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
        Route::get('display', 'ResumeController@displayUserInfo');
    });
});




