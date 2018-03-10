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
use App\Logic\Frontend\ResumeLogic;
use App\Models\Bonus;
use App\Models\Certificate;
use App\Models\Credit;
use App\Models\Education;
use App\Models\FamilyMember;
use App\Models\ForeignLanguage;
use App\Models\LanguageType;

use App\Models\Nation;
use App\Models\Punishment;
use App\Models\SchoolName;
use App\Models\Resume;
use App\Models\UserInfo;
use App\Models\WorkExperience;
use App\Validations\ResumeValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $resumeLogic = new ResumeLogic();
        $data = $resumeLogic->acquireResumeInfo();
        return response()->json(ApiException::success(ApiException::SUCCESS, $data));
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
     * @return \Illuminate\Http\JsonResponse
     * 显示指定的家庭成员信息
     */
    public function displayAppointedFamilyMember(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateId($request, 'familyId', 'familyId');
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $familyMember = FamilyMember::findFirstById($request->get('familyId'), ['id', 'call', 'name',
            'broth_at', 'company', 'job'], true);
        if (!$familyMember) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $familyMember));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 获取对应外语的证书
     */
    public function acquireCertificate(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateId($request, 'languageId', 'languageId');
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $languageId = $request->get('languageId');
        $cacheKey = 'language:' . $languageId;
        $certificateData = Cache::get($cacheKey);
        if (!$certificateData) {
            $certificateData = Certificate::findMoreByKey('type_id', $languageId, ['*'], true);
            if (!$certificateData) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }
            //存入缓存中
            Cache::put($cacheKey, $certificateData, 3 * 60);
            return response()->json(ApiException::success(ApiException::SUCCESS, $certificateData));
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $certificateData));
    }




}