<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/10
 * Time: 13:57
 */

namespace App\Validations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseValidation
{
    public function validateId(Request $request, $fieldName='id', $attributeName='id')
    {
        $rules = [
            $fieldName => 'required|integer'
        ];

        $messages = [
            'required' => ':attribute不能为空',
            'integer'  => ':attribute的值必须是整数'
        ];

        $attributes = [
            $fieldName => $attributeName
        ];

        return Validator::make([$fieldName => $request->get($fieldName)], $rules, $messages, $attributes);
    }
}