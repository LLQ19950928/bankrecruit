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
use App\Models\Credit;
use App\Models\Education;
use App\Models\ForeignLanguage;
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
        $schoolResume = SchoolResume::findFirstByKey('user_id', session('userId'));
        if ($schoolResume->info_id == 0) {
            $userInfo = UserInfo::create($request->post());
            $result = $schoolResume->update(['info_id' => $userInfo->id]);
        }else {
            $result = UserInfo::findFirstById($schoolResume->info_id)->update($request->post());
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
         $user = User::findFirstById(session('userId', 0));
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
        $schoolResume = SchoolResume::findFirstByKey('user_id', session('userId', 0));
        if (!$schoolResume) {
            return response()->json(ApiException::error(ApiException::RESUME_NOT_EXISTS));
        }
        $result = $education->update(['resume_id' => $schoolResume->id]);
        if ($result) {

            $selectedArr = [
                'id' => $education->id,
                'entrance_time' => $education->entrance_time,
                'graduation_time' => $education->graduation_time,
                'school_name' => $education->school_name,
                'academy_name' => $education->academy_name,
                'profession_name' => $education->profession_name,
                'acquire_education' => $education->acquire_education
            ];
            return response()->json(ApiException::success(ApiException::SUCCESS, $selectedArr));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 修改用户教育背景
     */
    public function updateUserEducation(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateUserEducation($request);
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $education = Education::findFirstById($request->post('id'));
        if ($education->update($request->post())) {
            return response()->json(ApiException::success(ApiException::SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    #todo
    public function deleteUserEducation(Request $request)
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑用户的外语能力
     */
    public function editUserForeignLanguage(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateUserForeignLanguage($request);
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $lang = ForeignLanguage::create($request->post());
        if (!$lang) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $schoolResume = SchoolResume::findFirstByKey('user_id', session('userId', 0));
        if (!$schoolResume) {
            return response()->json(ApiException::error(ApiException::RESUME_NOT_EXISTS));
        }
        $result = $lang->update(['resume_id' => $schoolResume->id]);
        if ($result) {

            $selectedArr = [
                'id' => $lang->id,
                'order' => $lang->order,
                'type_id' => $lang->type_id,
                'grade' => $lang->grade,
                'certificate_level_id' => $lang->certificate_level_id,
                'acquire_date' => $lang->acquire_date
            ];
            return response()->json(ApiException::success(ApiException::SUCCESS, $selectedArr));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 修改用户外语信息
     */
    public function updateUserForeignLanguage(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateUserForeignLanguage($request);
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $foreignLanguage = ForeignLanguage::findFirstById($request->post('id'));
        if ($foreignLanguage->update($request->post())) {
            return response()->json(ApiException::success(ApiException::SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑用户学分绩点信息
     */
    public function editCredit(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateUserCredit($request);
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $creditId = (SchoolResume::findFirstByKey('user_id', session('userId'), ['id']))->credit_id;
        if (!$creditId) {
            $credit = Credit::create($request->post());
        }else {
            $credit = Credit::update($request->post());
        }
        
        if (!$credit) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }

        return response()->json(ApiException::success(ApiException::SUCCESS));
    }

}