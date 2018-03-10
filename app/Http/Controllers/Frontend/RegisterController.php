<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/8
 * Time: 9:52
 *
 * 用户注册
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Mews\Captcha\Facades\Captcha;


class RegisterController extends Controller
{

    /**
     * 显示注册页面
     */
    public function display()
    {
        return view('frontend/register/display');
    }

    /**
     * 显示验证码
     */
    public function captcha()
    {
        return Captcha::create();
    }


}