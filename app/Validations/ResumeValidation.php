<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 21:42
 *
 * 校验用户的简历信息
 */

namespace App\Validations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ResumeValidation
{
    /**
     * @param Request $request
     * @return mixed
     * 校验用户简历的基本信息
     */
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

    /**
     * @param Request $request
     * @return mixed
     * 校验用户的最高学历
     */
    public function validateHighestEducation(Request $request)
    {
           $rules = [
               'highest_education' => 'required',
               'highest_degree'    => 'required'
           ];

           $messages = [
               'required' => ':attribute不能为空'
           ];

           $attributes = [
               'highest_education' => '最高学历',
               'highest_degree'  => '最高学位'
           ];

           return Validator::make($request->post(), $rules, $messages, $attributes);
    }

    /**
     * @param Request $request
     * @return mixed
     * 校验用户教育背景
     */
    public function validateUserEducation(Request $request)
    {
        $rules = [
            'acquire_education'   => 'required',
            'acquire_degree'      => 'required',
            'entrance_time'       => 'required',
            'graduation_time'     => 'required',
            'school_location'     => 'required',
            'school_name'         => 'required',
            'train_type'          => 'required',
            'education_type'      => 'required'
        ];

        $messages = [
            'required' => ':attribute不能为空'
        ];

        $attributes = [
            'acquire_education'   => '获得学历',
            'acquire_degree'      => '获得学位',
            'entrance_time'       => '入学时间',
            'graduation_time'     => '毕业时间',
            'school_location'     => '学校属地',
            'school_name'         => '学校名称',
            'train_type'          => '培养方式',
            'education_type'      => '教育类型'
        ];

        return Validator::make($request->post(), $rules, $messages, $attributes);
    }


}