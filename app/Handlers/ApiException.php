<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 16:41
 * 
 * 添加、修改、删除成功  ---> 操作成功
 * 其它操作成功（如登录成功、注册成功） --> 自定义消息
 * 查询不到对应的数据    ---> 自定义消息
 */

namespace App\Handlers;


class ApiException
{
     const SUCCESS = 200;
     const LOGIN_SUCCESS = 201;
     const LOGIN_OUT_SUCCESS = 202;
     const FAILED  = 10001;
     const PLEASE_LOGIN = 10002;
     const VALIDATION_FAILED = 10003;
     const USER_NOT_EXISTS = 10004;
     const PASSWORD_ERROR  = 10005;
     const REGISTER_FAILED = 10006;
     const RESUME_NOT_EXISTS = 10007;
     const REGISTER_SUCCESS = 10008;
     const REPEAT_APPLY = 10008;
     const UPLOAD_IMAGE_ERROR = 10009;

     protected static $_codeList = [
         
         self::SUCCESS    => '操作成功',
         self::REGISTER_SUCCESS => '注册成功',
         self::LOGIN_SUCCESS => '登录成功',
         self::LOGIN_OUT_SUCCESS => '退出登录成功',
         self::FAILED     => '操作失败',
         self::PLEASE_LOGIN => '请先登录',
         self::VALIDATION_FAILED => '验证失败',
         self::USER_NOT_EXISTS   => '用户不存在',
         self::PASSWORD_ERROR    => '密码不正确',
         self::REGISTER_FAILED   => '注册失败',
         self::RESUME_NOT_EXISTS => '用户简历不存在',
         self::REPEAT_APPLY => '您已申请该职位，请勿重复申请',
         self::UPLOAD_IMAGE_ERROR => '图片格式错误'
     ];

     public static function success($code=self::SUCCESS, $data=[])
     {
         return ['code' => $code,
             'msg' => self::$_codeList[$code],
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