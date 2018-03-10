<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/9
 * Time: 0:40
 */

namespace App\Http\Controllers\Frontend;


use App\Models\Job;
use Illuminate\Http\Request;

class SchoolRecruitController
{
    public function getSchoolRecruitInfo()
    {
        $jobs = Job::findMoreByKey('status', 1, ['*'], true);
        return view('frontend/schoolrecruit/schoolrecruit', ['data' => $jobs ? $jobs : []]);
    }

    public function getSchoolRecruitDetail(Request $request)
    {
        $jobId = $request->get('id');
        $job = Job::findFirstById($jobId, ['*'], true);
        $job['exam_place'] = explode(',', $job['exam_place']);
        $job['interview_place'] = explode(',', $job['interview_place']);
        return view('frontend/schoolrecruit/schoolrecruitdetail', ['data' => $job ? $job : '']);
    }

}