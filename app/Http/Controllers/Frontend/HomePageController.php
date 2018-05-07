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
use App\Models\Bank;
use App\Models\Job;

class HomePageController extends Controller
{
    public function display()
    {
        $aboutBank = AboutBank::findFirstById(1, ['*'], true);
        $announce = Announce::where('status', 2)
                    ->where('end_at', '>', time())
                    ->get(['id', 'title', 'published_at']);
        $announce = $announce ? $announce->all() : [];

        $schoolRecruit = Job::where('status', 2)->where('recruit_type', 1)
                         ->where('end_at', '>', time())
                         ->get(['id', 'company', 'job_name', 'published_at']);
        foreach ($schoolRecruit as &$sr)
        {
            $sr['company'] =  (Bank::findFirstById($sr['company'],
                ['bank_name'], true))['bank_name'];
        }
        $schoolRecruit = $schoolRecruit ? $schoolRecruit->all() : [];

        $socialRecruit = Job::where('status', 2)->where('recruit_type', 2)
            ->where('end_at', '>', time())
            ->get(['id', 'job_name', 'company','published_at']);
        foreach ($socialRecruit as &$sr)
        {
            $sr['company'] =  (Bank::findFirstById($sr['company'],
                ['bank_name'], true))['bank_name'];
        }
        $socialRecruit = $socialRecruit ? $socialRecruit->all() : [];

        $data = [
            'introduction' => Utility::subtext(strip_tags($aboutBank['introduction']), 90),
            'announce' => array_slice($announce, 0, 5),
            'schoolR' => $schoolRecruit,
            'socialR' => $socialRecruit
        ];
        return view('frontend/homepage/display', ['data' => $data]);
    }
}