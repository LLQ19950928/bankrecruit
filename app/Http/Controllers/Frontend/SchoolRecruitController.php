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
        $schoolRecruit = Job::where('status', 2)->where('recruit_type', 1)
               ->where('end_at', '>', time())->get();
        $schoolRecruit = $schoolRecruit ? $schoolRecruit->all() : [];
        return view('frontend/schoolrecruit/schoolrecruit',
            ['data' => $schoolRecruit ? $schoolRecruit : []]);
    }

    public function getSchoolRecruitDetail(Request $request)
    {
        $jobId = $request->get('id');
        $isUpdate = $request->get('is_update', 0);

        $job = Job::findFirstById($jobId, ['*'], true);
        $job['exam_place'] = explode(',', $job['exam_place']);
        $job['interview_place'] = explode(',', $job['interview_place']);
        $job['is_update'] = $isUpdate;
        return view('frontend/schoolrecruit/schoolrecruitdetail', ['data' => $job ? $job : '']);
    }

}