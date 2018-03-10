<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 16:52
 *
 * 用户登录
 */

namespace App\Http\Controllers\Backend;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;


use App\Logic\Backend\LoginLogic;
use App\Models\User;
use App\Validations\UserValidation;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 处理登录
     */
    public function login(Request $request)
    {
          $userValidation = new UserValidation();
          $validator = $userValidation->validateLogin($request);
          if ($validator->fails()) {
              return response()->json(ApiException::error(
                  ApiException::VALIDATION_FAILED, $validator->errors()->first()));
          }
          //验证密码是否正确
          $loginLogic = new LoginLogic();
          if ($loginLogic->checkPassword($request)) {

              return response()->json(ApiException::success(ApiException::LOGIN_SUCCESS));
          }else {
              return response()->json(ApiException::error(
                  ApiException::PASSWORD_ERROR));
          }
    }

    /**
     * 退出登录
     */
    public function loginOut(Request $request)
    {
        $request->session()->forget('userId');
        return redirect('http://bank.schoolrecruit.cn/frontend/homepage/display');
    }


}