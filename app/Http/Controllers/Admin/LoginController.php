<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/6
 * Time: 14:44
 */

namespace App\Http\Controllers\Admin;


use App\Handlers\ApiException;
use App\Logic\Backend\LoginLogic;
use App\Models\Admin;
use App\Validations\AdminValidation;
use Illuminate\Http\Request;

class LoginController
{
    public function display()
    {
        return view('admin/login/display');
    }

    public function login(Request $request)
    {
        $adminValidation = new AdminValidation();
        $validator = $adminValidation->validateLogin($request);
        if ($validator->fails()) {
            return response()->json(ApiException::error(
                ApiException::VALIDATION_FAILED, $validator->errors()->first()));
        }
        //验证密码是否正确
        $loginLogic = new LoginLogic();
        if ($loginLogic->checkAdminPassWord($request)) {

            return response()->json(ApiException::success(ApiException::LOGIN_SUCCESS));
        }else {
            return response()->json(ApiException::error(
                ApiException::PASSWORD_ERROR));
        }
    }

    public function loginOut(Request $request)
    {
        $request->session()->forget(['adminId', 'adminName']);
        return redirect('http://bank.recruit.cn/admin/login/display');
    }
}