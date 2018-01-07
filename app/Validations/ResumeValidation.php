<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 21:42
 */

namespace App\Validations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ResumeValidation
{
    public function validateUserInfo(Request $request)
    {
        $rules = [
            'name'  => 'required',
            'borth_at' => 'required',
            'gender'   => 'required',
            'nation'   => 'required',
            'family_at' => 'required',
            'place_of_origin' => 'required',
            'marry'     => 'required',
            'political_status' => 'required',
            'id_type' => 'required',
            'id_number' => 'required',
            'phone_number' => 'required|digits:11'
        ];
        $messages = [
            'required' => ':attribute不能为空',
            'digits'   => ':attribute的长度必须是:digits位'
        ];
        $attributes = [
            'name'  => '姓名',
            'borth_at' => '出生年月',
            'gender'   => '性别',
            'nation'   => '民族',
            'family_at' => '家庭常住地',
            'place_of_origin' => '籍贯',
            'marry'     => '婚姻状况',
            'political_status' => '政治面貌',
            'id_type' => '证件类别',
            'id_number' => '证件号码',
            'phone_number' => '联系方式'
        ];
        return Validator::make($request->post(), $rules, $messages, $attributes);
    }


}