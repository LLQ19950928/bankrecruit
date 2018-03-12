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
use App\Models\Bonus;
use App\Models\Credit;
use App\Models\Education;
use App\Models\FamilyMember;
use App\Models\ForeignLanguage;
use App\Models\Punishment;
use App\Models\Resume;
use App\Models\UserInfo;
use App\Models\WorkExperience;
use App\Validations\ResumeValidation;
use Illuminate\Http\Request;

class ResumeController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑个人基本信息
     */
    public function editResumeBaseInfo(Request $request)
    {
        $resume = Resume::findFirstByKey('user_id', session('userId'));
        if ($resume->info_id == 0) {
            $userInfo = UserInfo::create($request->post());
            $result = $resume->update(['info_id' => $userInfo->id]);
        }else {
            $result = UserInfo::findFirstById($resume->info_id)->update($request->post());
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
     * 编辑用户教育背景
     */
    public function editEduSituation(Request $request)
    {
        $education = Education::create($request->post());
        if (!$education) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $resume = Resume::findFirstByKey('user_id', session('userId', 0));
        if (!$resume) {
            return response()->json(ApiException::error(ApiException::RESUME_NOT_EXISTS));
        }
        $result = $education->update(['resume_id' => $resume->id]);
        if ($result) {
            return response()->json(ApiException::success(ApiException::SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    /**
     * @param Request $request
     * 修改用户教育背景
     */
    public function updateEduInfo(Request $request)
    {
        $id = $request->post('id');
        $education = Education::findFirstById($id, ['*']);
        $result = $education->update($request->post());
        if ($result) {
           return ApiException::success(ApiException::SUCCESS);
        }else {
           return ApiException::error(ApiException::FAILED);
        }
    }

    #todo
    public function deleteUserEducation(Request $request)
    {

    }

    /**
     * 编辑工作经历
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function editWorkExperienceInfo(Request $request)
    {
        $workExperience = WorkExperience::create($request->post());
        if (!$workExperience) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $resume = Resume::findFirstByKey('user_id', session('userId', 0));
        if (!$resume) {
            return response()->json(ApiException::error(ApiException::RESUME_NOT_EXISTS));
        }
        $result = $workExperience->update(['resume_id' => $resume->id]);
        if ($result) {
            return response()->json(ApiException::success(ApiException::SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑受到的奖励情况
     */
    public function editBonusInfo(Request $request)
    {

        $bonus = Bonus::create($request->post());
        if (!$bonus) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $id = (Resume::findFirstByKey('user_id', session('userId'), ['id']))->id;
        $result = $bonus->update(['resume_id' => $id]);
        if ($result) {
            return response()->json(ApiException::success(ApiException::SUCCESS, $bonus->toArray()));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }

    }

    public function updateBonusInfo(Request $request)
    {
        $id = $request->post('id');
        $bonus = Bonus::findFirstById($id, ['*']);
        $result = $bonus->update($request->post());
        if ($result) {
            return ApiException::success(ApiException::SUCCESS);
        }else {
            return ApiException::error(ApiException::FAILED);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑用户家庭成员信息
     */
    public function editFamilyMember(Request $request)
    {
        $familyMember = FamilyMember::create($request->post());
        if (!$familyMember) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $id = (Resume::findFirstByKey('user_id', session('userId'), ['id']))->id;
        $result = $familyMember->update(['resume_id' => $id]);
        if (!$result) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        return response()->json(ApiException::success(ApiException::SUCCESS));
    }

    public function updateFamilyMember(Request $request)
    {
         $id = $request->post('id');
         $familyMember = FamilyMember::findFirstById($id, ['*']);
         $result = $familyMember->update($request->post());
         if ($result) {
             return response()->json(ApiException::success(ApiException::SUCCESS));
         }else {
             return response()->json(ApiException::error(ApiException::FAILED));
         }
    }

}