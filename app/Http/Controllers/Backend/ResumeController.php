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
use App\Models\Evaluation;
use App\Models\FamilyMember;
use App\Models\ForeignLanguage;
use App\Models\Project;
use App\Models\Punishment;
use App\Models\Resume;
use App\Models\UserCertificate;
use App\Models\UserForeign;
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

        $post = $request->post();
        $post['place_of_origin'] = $post['province'] . ',' . $post['city'];
        unset($post['province']);
        unset($post['city']);

        //文件上传处理


        if ($resume->info_id == 0) {
            $userInfo = UserInfo::create($post);
            $result = $resume->update(['info_id' => $userInfo->id]);
        }else {
//            $post['user_id'] = session('userId');
            $result = UserInfo::findFirstById($resume->info_id)->update($post);
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
     * @return array
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

    public function updateWorkExperience(Request $request)
    {
        $id = $request->post('id');
        $workExperience = WorkExperience::findFirstById($id, ['*']);
        $result = $workExperience->update($request->post());
        if ($result) {
            return response()->json(ApiException::success(ApiException::SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    public function editUserCertificate(Request $request)
    {
          $post = $request->post();
          $post['user_id'] = session('userId');
          $userCertificate = UserCertificate::create($post);
          if ($userCertificate) {
            return response()->json(ApiException::success(ApiException::SUCCESS));
          }else {
            return response()->json(ApiException::error(ApiException::FAILED));
          }
    }

    public function editUserForeign(Request $request)
    {
        $post = $request->post();
        $post['user_id'] = session('userId');
        $userForeign = UserForeign::create($post);
        if ($userForeign) {
            return response()->json(ApiException::success(ApiException::SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    public function editProject(Request $request)
    {
        $project = Project::create($request->post());
        if (!$project) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $id = (Resume::findFirstByKey('user_id', session('userId'), ['id']))->id;
        $result = $project->update(['resume_id' => $id]);
        if ($result) {
            return response()->json(ApiException::success(ApiException::SUCCESS, $project->toArray()));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    public function editEval(Request $request)
    {
        $evaluation = Evaluation::findFirstByKey('resume_id',
            session('resumeId'), ['*'], true);
        if ($evaluation) {
           $result = $evaluation->update($request->post());
        }else {
           $post = $request->post();
           $post['resume_id'] = session('resumeId');
           $result = Evaluation::create($post);
        }
        if ($result) {
            return response()->json(ApiException::success(ApiException::SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }


}