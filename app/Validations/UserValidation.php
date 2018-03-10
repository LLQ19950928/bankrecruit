<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 11:24
 *
 * 用户注册登录校验
 */

namespace App\Validations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserValidation extends BaseValidation
{
    /**
     * @param Request $request
     * @return mixed
     * 用户注册校验
     */
    public function validateRegister(Request $request)
    {
         $rules = [
             'email'                 => 'required|email',
             'password'              => 'required|confirmed',
             'password_confirmation' => 'required',
             'cpt'               => 'required|captcha'
         ];

         $messages = [
             'required' => ':attribute不能为空',
             'email'    => ':attribute格式不符合要求',
             'confirmed' => '两次密码不一致',
             'captcha'   => '验证码错误，请重试'
         ];

         $attributes = [
             'email'    => '电子邮箱',
             'password' => '密码',
             'password_confirmation' => '确认密码',
             'cpt'      => '验证码'
         ];
         return Validator::make($request->post(), $rules, $messages, $attributes);
    }

    /**
     * @param Request $request
     * @return mixed
     * 用户登录校验
     */
    public function validateLogin(Request $request)
    {
        $rules = [
            'email' => 'required|exists:user,email',
            'password' => 'required',
            'cpt'   => 'required|captcha',
        ];

        $messages = [
            'required' => ':attribute不能为空',
            'exists'   => ':attribute不存在，请注册',
            'captcha'   => '验证码错误，请重试'
        ];

        $attributes = [
            'email' => '邮箱地址',
            'password' => '密码',
            'cpt'      => '验证码'
        ];

        return Validator::make($request->post(), $rules, $messages, $attributes);
    }
}