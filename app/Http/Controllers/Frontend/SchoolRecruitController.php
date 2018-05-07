<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/9
 * Time: 0:40
 */

namespace App\Http\Controllers\Frontend;


use App\Models\Bank;
use App\Models\Job;
use Illuminate\Http\Request;

class SchoolRecruitController
{
    public function getSchoolRecruitInfo()
    {
        $schoolRecruit = Job::where('status', 2)->where('recruit_type', 1)
               ->where('end_at', '>', time())->get();
        foreach ($schoolRecruit as &$sr) {
            $sr['company'] = (Bank::findFirstById($sr['company'], ['bank_name'], true))['bank_name'];
        }
        $schoolRecruit = $schoolRecruit ? $schoolRecruit->all() : [];
        return view('frontend/schoolrecruit/schoolrecruit',
            ['data' => $schoolRecruit ? $schoolRecruit : []]);
    }

    public function getSchoolRecruitDetail(Request $request)
    {
        $jobId = $request->get('id');
        $job = Job::findFirstById($jobId, ['*'], true);
        $job['company'] = (Bank::findFirstById($job['company'], ['bank_name'], true))['bank_name'];
        $job['exam_place'] = explode(',', $job['exam_place']);
        $job['interview_place'] = explode(',', $job['interview_place']);
        return view('frontend/schoolrecruit/schoolrecruitdetail', ['data' => $job ? $job : '']);
    }

}