<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 16:41
 */

namespace App\Handlers;


class ApiException
{
     const SUCCESS = 200;
     const FAILED  = 10001;
     const PLEASE_LOGIN = 10002;
     const VALIDATION_FAILED = 10003;
     const USER_NOT_EXISTS = 10004;

     protected static $_codeList = [
         self::SUCCESS    => '操作成功',
         self::FAILED     => '操作失败',
         self::PLEASE_LOGIN => '请先登录',
         self::VALIDATION_FAILED => '验证失败',
         self::USER_NOT_EXISTS   => '用户不存在'
     ];

     public static function success($msg='', $data=[])
     {
         return ['code' => self::SUCCESS,
             'msg' => $msg ? $msg : self::$_codeList[self::SUCCESS],
             'data' => $data];
     }

    public static function error($code, $msg='', $data=[])
    {
        return [
            'code' => $code,
            'msg'  => $msg ? $msg : self::$_codeList[$code],
            'data' => $data
        ];
    }
}