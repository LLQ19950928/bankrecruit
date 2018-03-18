<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/8
 * Time: 0:20
 */

namespace App\Http\Controllers\Admin;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class RecruitController extends Controller
{
    public function getSchoolRecruitInfo()
    {
          $jobs = Job::findMoreByKey('recruit_type', 1, ['*'], true);
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

    public function getSocialRecruitInfo()
    {
        $jobs = Job::findMoreByKey('recruit_type', 2, ['*'], true);
        return view('admin/socialrecruit/socialrecruit', ['data' => $jobs ? $jobs : []]);
    }

    public function editSocialRecruitInfo(Request $request)
    {
        return view('admin/socialrecruit/editsocialrecruitinfo');
    }
}