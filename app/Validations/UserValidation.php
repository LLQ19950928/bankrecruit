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
             'username'              => 'required|min:3',
             'realname'              => 'required',
             'email'                 => 'required|email',
             'gender'                => 'required',
             'phone'                 => 'required|digits:11',
             'password'              => 'required|min:8|confirmed',
             'password_confirmation' => 'required',
             'resume_type'           => 'required',
             'certificates_type'     => 'required',
             'certificates_number'   => 'required'
         ];
         $messages = [
             'required' => ':attribute不能为空',
             'min'      => ':attribute长度至少:min位',
             'email'    => ':attribute格式不符合要求',
             'digits'   => ':attribute长度必须是:digits位',
             'confirmed' => '两次密码不一致',
             'resume_type' => ':attribute不能为空',
             'certificates_type' => ':attribute不能为空',
             'certificates_number' => ':attribute不能为空'
         ];
         $attributes = [
             'username' => '用户名',
             'realname' => '真实姓名',
             'email'    => '电子邮箱',
             'gender'   => '性别',
             'phone'    => '手机号码',
             'password' => '密码',
             'password_confirmation' => '确认密码',
             'resume_type' => '简历类型',
             'certificates_type'     => '证件类型',
             'certificates_number'   => '证件号码'
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
            'username' => 'required|exists:user,username',
            'password' => 'required'
        ];

        $messages = [
            'required' => ':attribute不能为空',
            'exists'   => ':attribute不存在，请注册',
        ];

        $attributes = [
            'username' => '用户名',
            'password' => '密码'
        ];

        return Validator::make($request->post(), $rules, $messages, $attributes);
    }
}