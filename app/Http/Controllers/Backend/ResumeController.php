<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 21:20
 *
 * 用户简历
 */

namespace App\Http\Controllers\Backend;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\SchoolResume;
use App\Models\User;
use App\Models\UserInfo;
use App\Validations\ResumeValidation;
use Illuminate\Http\Request;

class ResumeController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑个人基本信息
     */
    public function editUserInfo(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateUserInfo($request);
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $schoolResume = SchoolResume::where('user_id', session('userId', 0))->first();
        if ($schoolResume->info_id == 0) {
            $userInfo = UserInfo::create($request->post());
            $result = $schoolResume->update(['info_id' => $userInfo->id]);
        }else {
            $result = UserInfo::where('id', $schoolResume->info_id)->update($request->post());
        }
        if ($result) {
            return response()->json(ApiException::success());
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑用户最高学历
     */
    public function editUserHighestEducation(Request $request)
    {
         $resumeValidation = new ResumeValidation();
         $validator = $resumeValidation->validateHighestEducation($request);
         if ($validator->fails()) {
             return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                 $validator->errors()->first()));
         }
         $user = User::find(session('userId', 0));
         if (!$user) {
             return response()->json(ApiException::error(ApiException::USER_NOT_EXISTS));
         }
         //修改用户的最高简历
         $result = $user->update($request->post());
         if ($result) {
             return response()->json(ApiException::success());
         }else {
             return response()->json(ApiException::error(ApiException::FAILED));
         }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑用户教育背景
     */
    public function editUserEducation(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateUserEducation($request);
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $education = Education::create($request->post());
        if (!$education) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $schoolResume = SchoolResume::where('user_id', session('userId', 0))->first();
        $result = $education->update(['resume_id' => $schoolResume->id]);
        if ($result) {

            $selectedArr = [
                'entrance_time' => $education->entrance_time,
                'graduation_time' => $education->graduation_time,
                'school_name' => $education->school_name,
                'academy_name' => $education->academy_name,
                'profession_name' => $education->profession_name,
                'acquire_education' => $education->acquire_education
            ];
            return response()->json(ApiException::success('', $selectedArr));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }


}