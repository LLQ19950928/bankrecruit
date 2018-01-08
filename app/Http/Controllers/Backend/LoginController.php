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
              return response()->json(ApiException::error(ApiException::FAILED, $validator->errors()->first()));
          }
          //验证密码是否正确
          $username = $request->post('username');
          $password = $request->post('password');
          $user = User::where('username', $username)->first();
          $hash = $user->password;
          if (password_verify($password, $hash)) {
              session(['userId' => $user->id]);
              return response()->json(ApiException::success('登录成功'));
          }else {
              return response()->json(ApiException::error(
                  ApiException::FAILED, '密码不正确'));
          }
    }

    /**
     * 退出登录
     */
    public function loginOut(Request $request)
    {
        $request->session()->forget('user_id');
        return response()->json(ApiException::success('退出登录成功'));
    }
}