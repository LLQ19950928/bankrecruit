<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/24
 * Time: 11:09
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function display()
    {
        return view('frontend/homepage/display');
    }
}