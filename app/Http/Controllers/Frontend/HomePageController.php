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
use App\Models\Job;

class HomePageController extends Controller
{
    public function display()
    {
        $aboutBank = AboutBank::findFirstById(1, ['*'], true);
        $announce = Announce::findMoreByKey('status', 1,
            ['id', 'title', 'published_at'], true);
        $schoolRecruit = Job::findMoreByKey('recruit_type', 1,
            ['id', 'job_name', 'start_date'], true);
        $socialRecruit = Job::findMoreByKey('recruit_type', 2,
            ['id', 'job_name', 'start_date'], true);
        $data = [
            'introduction' => Utility::subtext(strip_tags($aboutBank['introduction']), 90),
            'announce' => array_slice($announce, 0, 5),
            'schoolR' => $schoolRecruit,
            'socialR' => $socialRecruit
        ];
        return view('frontend/homepage/display', ['data' => $data]);
    }
}