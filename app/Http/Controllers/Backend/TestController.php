<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/9
 * Time: 12:12
 */

namespace App\Http\Controllers\Backend;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\User;

class TestController extends Controller
{
    public function test()
    {
          $user = User::findFirstByKey('username', 'sllq', ['email', 'gender'], true);
          if ($user) {
              return response()->json(ApiException::success(ApiException::SUCCESS, $user));
          }else {
              return response()->json(ApiException::error(ApiException::USER_NOT_EXISTS));
          }

    }
}