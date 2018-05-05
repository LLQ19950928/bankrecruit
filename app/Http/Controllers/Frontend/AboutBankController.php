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
use Illuminate\Http\Request;

class AboutBankController extends Controller
{

    public function getIntroductionInfo(Request $request)
    {
         $interduction = AboutBank::findFirstById(1, ['introduction'], true);
         return view('frontend/aboutbank/interduction',
             ['data' => $interduction ? $interduction : []]);
    }

    public function getCultureInfo(Request $request)
    {
         $culture = AboutBank::findFirstById(1, ['culture'], true);
         return view('frontend/aboutbank/culture',
             ['data' => $culture ? $culture : []]);
    }

    public function getTrainInfo(Request $request)
    {
        $train = AboutBank::findFirstById(1, ['train'], true);
        return view('frontend/aboutbank/train', ['data' => $train ? $train : []]);
    }

}