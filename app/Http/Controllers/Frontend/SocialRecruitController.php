<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/18
 * Time: 11:16
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class SocialRecruitController extends Controller
{
    public function getSocialRecruitInfo()
    {
        $socialRecruit = Job::where('status', 2)->where('recruit_type', 2)
            ->where('end_at', '>', time())
            ->get(['id', 'job_name', 'published_at']);
        $socialRecruit = $socialRecruit ? $socialRecruit->all() : [];
        return view('frontend/socialrecruit/socialrecruit',
            ['data' => $socialRecruit ? $socialRecruit : []]);
    }

    public function getSocialRecruitDetail(Request $request)
    {
        $jobId = $request->get('id');
        $isUpdate = $request->get('is_update', 0);

        $job = Job::findFirstById($jobId, ['*'], true);
        $job['exam_place'] = explode(',', $job['exam_place']);
        $job['interview_place'] = explode(',', $job['interview_place']);
        $job['is_update'] = $isUpdate;
        return view('frontend/socialrecruit/socialrecruitdetail',
            ['data' => $job ? $job : []]);
    }
}