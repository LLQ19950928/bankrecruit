<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/12
 * Time: 15:02
 */

namespace App\Validations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AnnounceValidation extends BaseValidation
{
    public function validateAnnounce(Request $request)
    {
        $rules = [
            'title' => 'required|max:50',
            'content' => 'required|max:7000'
        ];

        $messages = [
            'required' => ':attribute不能为空',
            'max' => '字数必须在:max以内'
        ];

        $attributes = [
            'title' => '标题',
            'content' => '内容'
        ];

        return Validator::make($request->post(), $rules, $messages, $attributes);
    }
}