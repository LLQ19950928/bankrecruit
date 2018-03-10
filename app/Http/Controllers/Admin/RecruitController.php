<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/8
 * Time: 0:20
 */

namespace App\Http\Controllers\Admin;


use App\Handlers\ApiException;
use App\Models\Job;
use Illuminate\Http\Request;

class RecruitController
{
    public function getSchoolRecruitInfo()
    {
          $jobs = Job::findAll(['*'], true);
          return view('admin/schoolrecruit/schoolrecruit', ['data' => $jobs ? $jobs : []]);
    }

    public function editSchoolRecruitInfo(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin/schoolrecruit/editschoolrecruitinfo');
        } else {
            $job = Job::create($request->post());
            if (!$job) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }
            if ($job->status == 1) {
                $result = $job->update(['published_at' => time()]);
                if ($result) {
                    return response()->json(ApiException::success(ApiException::SUCCESS));
                }else {
                    return response()->json(ApiException::error(ApiException::FAILED));
                }
            }else {
                return response()->json(ApiException::success(ApiException::SUCCESS));
            }


        }

    }
}