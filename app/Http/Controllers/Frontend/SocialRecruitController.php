<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/18
 * Time: 11:16
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Job;
use App\Models\Province;
use Illuminate\Http\Request;

class SocialRecruitController extends Controller
{
    public function getSocialRecruitInfo()
    {
        //获取省份信息
        $provinces = Province::findAll(['*'], true);
        $socialRecruit = Job::where('status', 2)->where('recruit_type', 2)
            ->where('end_at', '>', time())
            ->get();
        foreach ($socialRecruit as &$sr) {
            $sr['end_at'] = date('Y-m-d', $sr['end_at']);
            $sr['company'] = (Bank::findFirstById($sr['company'], ['bank_name'], true))['bank_name'];
        }
        $socialRecruit = $socialRecruit ? $socialRecruit->all() : [];
        $data = [
            'social' => $socialRecruit,
            'province' => $provinces
        ];
        return view('frontend/socialrecruit/socialrecruit',
            ['data' => $data ? $data : []]);
    }

    public function getSocialRecruitDetail(Request $request)
    {
        $jobId = $request->get('id');

        $job = Job::findFirstById($jobId, ['*'], true);
        $job['company'] = (Bank::findFirstById($job['company'], ['bank_name'],
            true))['bank_name'];
        $job['exam_place'] = explode(',', $job['exam_place']);
        $job['interview_place'] = explode(',', $job['interview_place']);
        return view('frontend/socialrecruit/socialrecruitdetail',
            ['data' => $job ? $job : []]);
    }
}