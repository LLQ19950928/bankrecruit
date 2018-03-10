<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/10
 * Time: 20:00
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\AboutBank;

class AboutBankController extends Controller
{
    public function getBankInfo()
    {
        $aboutBank = AboutBank::findAll(['*'], true);
        return view('frontend/aboutbank/bankinfo',
            ['data' => $aboutBank ? $aboutBank[0] : []]);
    }


}