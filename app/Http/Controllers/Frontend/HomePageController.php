<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/24
 * Time: 11:09
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Logic\Frontend\Utility;
use App\Models\AboutBank;
use App\Models\Announce;

class HomePageController extends Controller
{
    public function display()
    {
        $aboutBank = AboutBank::findFirstById(1, ['*'], true);
        $announce = Announce::findMoreByKey('status', 1, ['id', 'title', 'published_at'], true);
        $data = [
            'introduction' => Utility::subtext(strip_tags($aboutBank['introduction']), 90),
            'announce' => array_slice($announce, 0, 5)
        ];
        return view('frontend/homepage/display', ['data' => $data]);
    }
}