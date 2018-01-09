<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/8
 * Time: 9:53
 */

namespace App\Http\Controllers\Frontend;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\SchoolResume;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ResumeController extends Controller
{

    /**
     * 编辑简历
     */
    public function editResume()
    {

    }

    /**
     * 预览简历
     */
    public function previewResume()
    {

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示个人基本信息
     */
    public function displayUserInfo()
    {
        $schoolResume = SchoolResume::findFirstByKey('user_id', session('userId', 0));
        $infoId = $schoolResume->info_id;
        if ($infoId) {
            $userInfoArr = UserInfo::findFirstById($infoId, ['*'], true);
            if ($userInfoArr) {
                return response()->json(ApiException::success(ApiException::SUCCESS, $userInfoArr));
            }else {
                return response()->json(ApiException::success(ApiException::FAILED));
            }

        }else {
            return response()->json(ApiException::success());
        }

    }

    public function displayUserEducation()
    {
        //显示用户的最高学历
        $userH = User::select('highest_education', 'highest_degree')->first(session('userId'));
        //显示用户的教育背景
        $resumeId = SchoolResume::select('id')->first(session('userId'));
        $educationBgs = Education::select('entrance_time', 'graduation_time', 'school_name',
            'academy_name', 'profession_name', 'acquire_education')->where('resume_id', $resumeId)->get();
        //返回数据

    }


}