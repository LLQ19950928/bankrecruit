<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/9
 * Time: 0:40
 */

namespace App\Http\Controllers\Frontend;


use App\Handlers\ApiException;
use App\Models\Bank;
use App\Models\Job;
use App\Models\Province;
use Illuminate\Http\Request;

class SchoolRecruitController
{
    public function getSchoolRecruitInfo()
    {
        //获取省份信息
        $provinces = Province::findAll(['*'], true);
        $schoolRecruit = Job::where('status', 2)->where('recruit_type', 1)
               ->where('end_at', '>', time())->get();
        foreach ($schoolRecruit as &$sr) {
            $sr['company'] = (Bank::findFirstById($sr['company'], ['bank_name'], true))['bank_name'];
        }
        $schoolRecruit = $schoolRecruit ? $schoolRecruit->all() : [];
        $data = [
            'school' => $schoolRecruit,
            'province' => $provinces
        ];
        return view('frontend/schoolrecruit/schoolrecruit',
            ['data' => $data ? $data : []]);
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

    public function getDesignatedInfo(Request $request)
    {
        $searchId = $request->get('id');
        if ($searchId) {
            $bankIds = Bank::findMoreByKey('province_id', $searchId, ['id'], true);
        }else {
            $bankIds = Bank::findAll(['id'], true);
        }
        $arr = [];
        foreach ($bankIds as $k => $bankId)
        {
            $arr[$k] = $bankId['id'];
        }
        $jobs = Job::where('status', 2)->where('recruit_type', 1)
            ->where('end_at', '>', time())->whereIn('company', $arr)->get();
        $jobs = $jobs ? $jobs->all() : [];
        if ($jobs) {
            foreach ($jobs as &$job)
            {
                $job['end_at'] = date('Y-m-d', $job['end_at']);
                $job['company'] = (Bank::findFirstById($job['company'], ['bank_name'], true))['bank_name'];
            }
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $jobs));
    }

}