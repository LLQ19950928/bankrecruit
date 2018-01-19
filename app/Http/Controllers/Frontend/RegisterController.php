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

class RegisterController extends Controller
{

    /**
     * 显示注册页面
     */
    public function display()
    {
        return view('frontend/register/display');
    }
}