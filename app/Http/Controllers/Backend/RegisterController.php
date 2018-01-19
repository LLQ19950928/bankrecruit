<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 11:47
 *
 * 用户注册
 */

namespace App\Http\Controllers\Backend;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\SchoolResume;
use App\Models\User;
use App\Validations\UserValidation;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    /**
     * 处理用户注册
     */
    public function register(Request $request)
    {
        $userValidation = new UserValidation();
        $validator = $userValidation->validateRegister($request);
        //验证数据的合法性
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED, $validator->errors()->first()));
        }
        //存入数据库
        $result = User::create($request->except('password_confirmation'));
        if ($result) {
            SchoolResume::create(['user_id' => $result->id]);
            return response()->json(ApiException::success(ApiException::REGISTER_SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::REGISTER_FAILED));
        }
    }
}