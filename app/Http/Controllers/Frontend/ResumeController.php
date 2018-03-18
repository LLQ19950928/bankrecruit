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
use App\Models\Bonus;
use App\Models\ComputerCertificateName;
use App\Models\ComputerCertificateType;
use App\Models\Education;
use App\Models\FamilyMember;

use App\Models\Nation;
use App\Models\Resume;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\WorkExperience;
use Illuminate\Http\Request;


class ResumeController extends Controller
{

    /**
     * 简历入口
     */
    public function index()
    {
        return view('frontend/resume/index');
    }

    /**
     * 预览简历
     */
    public function previewResume()
    {
         $userId = session('userId');
         $resumeId = Resume::findFirstByKey('user_id', $userId, ['id'], true)['id'];
         $bonusArr = Bonus::findMoreByKey('resume_id', $resumeId, ['*'], true);
         $eduArr = Education::findMoreByKey('resume_id', $resumeId, ['*'], true);
         $familyArr = FamilyMember::findMoreByKey('resume_id', $resumeId, ['*'], true);
         $workArr = WorkExperience::findMoreByKey('resume_id', $resumeId, ['*'], true);
         $userInfo = UserInfo::findFirstByKey('user_id', $userId, ['*'], true);
         $data = [
             'bonus' => $bonusArr ? $bonusArr : [],
             'education'   => $eduArr ? $eduArr : [],
             'family' => $familyArr ? $familyArr : [],
             'work'   => $workArr ? $workArr : [],
             'userInfo' => $userInfo ? $userInfo : []
         ];
         return view('frontend/resume/previewresume', ['data' => $data]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示个人基本信息
     */
    public function getResumeBaseInfo()
    {

        $resume = Resume::findFirstByKey('user_id', session('userId', 0));
        $infoId = $resume->info_id;
        $data['userInfo'] = [];
        $data['nation'] = Nation::findAll(['id', 'nation'], true);
        if ($infoId) {
            $userInfoArr = UserInfo::findFirstById($infoId, ['*'], true);
            $data['userInfo'] = $userInfoArr;
        }

        return view('frontend/resume/resumebaseinfo', ['data' => $data]);

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示用户教育背景
     */
    public function getEduSituation()
    {
        $resume = Resume::findFirstByKey('user_id', session('userId', 0));
        $id = $resume->id;
        $data = Education::findMoreByKey('resume_id', $id, ['*'], true);
        return view('frontend/resume/edusituation', ['data' => $data ? $data : []]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 更新用户教育背景
     */
    public function updateEduInfo(Request $request)
    {

        $id = $request->get('id');
        $education = Education::findFirstById($id, ['*'], true);
        return view('frontend/resume/updateeduinfo', ['data' => $education]);
    }


    /**
     * 显示工作经历
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWorkExperienceInfo()
    {
        $resume = Resume::findFirstByKey('user_id', session('userId', 0));
        $id = $resume->id;
        $data = WorkExperience::findMoreByKey('resume_id', $id, ['*'], true);
        return view('frontend/resume/workexperienceinfo', ['data' => $data ? $data : []]);
    }

    public function updateWorkExperienceInfo(Request $request)
    {
        $id = $request->get('id');
        $workExperience = WorkExperience::findFirstById($id, ['*'], true);
        return view('frontend/resume/updatework',
            ['data' => $workExperience ? $workExperience : []]);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示用户奖励情况
     */
    public function getBonusInfo()
    {
         $id = (Resume::findFirstByKey('user_id', session('userId'), ['id']))->id;
         $data = Bonus::findMoreByKey('resume_id', $id, ['*'], true);
         return view('frontend/resume/bonusinfo', ['data' => $data ? $data : []]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 更新奖励信息
     */
    public function updateBonusInfo(Request $request)
    {
        $id = $request->get('id');
        $bonus = Bonus::findFirstById($id, ['*'], true);
        return view('frontend/resume/updatebounsinfo', ['data' => $bonus]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示用户的家庭成员
     */
    public function getFamilyMember()
    {
        $id = (Resume::findFirstByKey('user_id', session('userId'), ['id']))->id;
        $data = FamilyMember::findMoreByKey('resume_id', $id,  ['*'], true);
        return view('frontend/resume/familymember', ['data' => $data ? $data : []]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 更新家庭成员信息
     */
    public function updateFamilyMember(Request $request)
    {
        $id = $request->get('id');
        $familyMember = FamilyMember::findFirstById($id, ['*'], true);
        return view('frontend/resume/updatefamilymember', ['data' => $familyMember]);
    }

    public function getCertificateInfo()
    {
        $data = ComputerCertificateType::findAll(['id',
            'type_name'], true);
        return view('frontend/resume/certificate', ['data' => $data ? $data : []]);
    }

    public function updateCertificateInfo(Request $request)
    {

    }

    public function getCertificateName(Request $request)
    {
        $id = $request->get('id');
        $data =  ComputerCertificateName::findMoreByKey(
            'type_id', $id, ['*'], true);
        return ApiException::success(ApiException::SUCCESS, $data);
    }

}