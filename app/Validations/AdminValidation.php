<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/6
 * Time: 16:27
 */

namespace App\Validations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminValidation extends BaseValidation
{
    public function validateLogin(Request $request)
    {
        $rules = [
            'username' => 'required|exists:admin,username',
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