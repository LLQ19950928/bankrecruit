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
use App\Models\Polity;
use App\Models\Punishment;
use App\Models\SchoolName;
use App\Models\SchoolResume;
use App\Models\User;
use App\Models\UserInfo;
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
    public function displayUserInfo()
    {
        //获取民族信息
        $nation = Nation::findAll(['*'], true);
        //获取政治面貌
        $polity = Polity::findAll(['*'], true);

        $data['userInfo'] = [];

        $schoolResume = SchoolResume::findFirstByKey('user_id', session('userId', 0));
        $infoId = $schoolResume->info_id;
        if ($infoId) {
            $userInfoArr = UserInfo::findFirstById($infoId, ['*'], true);
            $data['userInfo'] = $userInfoArr;
        }
        $data['nation'] = $nation;
        $data['polity'] = $polity;

        return view('frontend/resume/userinfo', ['data' => $data]);

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示用户教育背景
     */
    public function displayUserEducation()
    {

        //显示用户的最高学历
        $userH = User::findFirstById(session('userId'), ['highest_education', 'highest_degree'], true);
        $data['userH'] = $userH ? $userH : [];
        //显示用户的教育背景
        $resumeId = (SchoolResume::findFirstByKey('user_id', session('userId'), ['id']))->id;
        $educationArr = Education::findMoreByKey('resume_id', $resumeId, ['id', 'entrance_time', 'graduation_time', 'school_name',
            'academy_name', 'profession_name', 'acquire_education'], true);
        $data['userE'] = $educationArr ? $educationArr : [];
        $resumeLogic = new ResumeLogic();
        $resumeLogic->acquireEducationInfo($data);
        return view('frontend/resume/usereducation', ['data' => $data]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 获取指定的教育背景信息
     */
    public function displayAppointedUserEducation(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateId($request, 'id', '教育id');
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        //获取指定的教育背景信息
        $education = Education::findFirstById($request->get('id'), ['*'], true);
        if (!$education) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $data['userE'] = $education;
        $resumeLogic = new ResumeLogic();
        $resumeLogic->acquireEducationInfo($data);
        if ($data) {
           return response()->json(ApiException::success(ApiException::SUCCESS, $data));
        }else {
           return response()->json(ApiException::error(ApiException::FAILED));
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 获取用户的外语信息
     */
    public function displayUserForeignLanguages()
    {
        //显示用户的外语能力
        $resumeId = (SchoolResume::findFirstByKey('user_id', session('userId'), ['id']))->id;
        $languageArr = ForeignLanguage::findMoreByKey('resume_id', $resumeId, ['id', 'order', 'type_id', 'certificate_level_id',
            'grade', 'acquire_date'], true);
        $data['lang'] = $languageArr ? $languageArr : [];
        //获取所有外语种类
        $languageTypeData = LanguageType::findAll(['*'], true);
        if (!$languageTypeData) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $data['langT'] = $languageTypeData;
        return response()->json(ApiException::success(ApiException::SUCCESS, $data));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 获取指定的用户外语信息
     */
    public function displayAppointedUserForeignLanguages(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateId($request, 'id', '外语id');
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $foreignLanguage = ForeignLanguage::findFirstById($request->get('id'), ['*'], true);
        if (!$foreignLanguage) {
           return response()->json(ApiException::error(ApiException::FAILED));
        }
        //获取所有外语种类
        $languageTypeData = LanguageType::findAll(['*'], true);
        if (!$languageTypeData) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $data = [
            'lang' => $foreignLanguage,
            'langT' => $languageTypeData
        ];
        return response()->json(ApiException::success(ApiException::SUCCESS, $data));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示用户绩点信息
     */
    public function displayUserCredit()
    {
        $creditId = (SchoolResume::findFirstByKey('user_id', session('userId'), ['credit_id']))->credit_id;
        $credit = Credit::findFirstById($creditId, ['course_count', 'total_credit', 'gpa'], true);
        return response()->json(ApiException::success(ApiException::SUCCESS, $credit ? $credit : []));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示用户奖励情况
     */
    public function displayUserBonus()
    {
         $id = (SchoolResume::findFirstByKey('user_id', session('userId'), ['id']))->id;
         $bonusArr = Bonus::findMoreByKey('resume_id', $id, ['*'], true);
         return response()->json(ApiException::success(ApiException::SUCCESS, $bonusArr ? $bonusArr : []));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 获取指定的奖励情况
     */
    public function displayAppointedUserBonus(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateId($request, 'bonusId', 'bonusId');
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $bonus = Bonus::findFirstById($request->get('bonusId'), ['*'], true);
        if (!$bonus) {
            return response()->json(ApiException::error(ApiException::FAILED, $bonus));
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $bonus));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示用户处分情况
     */
    public function displayUserPunishment()
    {
        $id = (SchoolResume::findFirstByKey('user_id', session('userId'), ['id']))->id;
        $punishArr = Punishment::findMoreByKey('resume_id', $id, ['id', 'punish_name', 'punish_company'], true);
        return response()->json(ApiException::success(ApiException::SUCCESS, $punishArr ? $punishArr : []));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 获取指定的处分情况
     */
    public function displayAppointedUserPunishment(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateId($request, 'punishmentId', 'punishmentId');
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $punishment = Punishment::findFirstById($request->get('punishmentId'),
            ['id', 'punish_name', 'punish_company'], true);
        if (!$punishment) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $punishment));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示用户的家庭成员
     */
    public function displayFamilyMember()
    {
        $id = (SchoolResume::findFirstByKey('user_id', session('userId'), ['id']))->id;
        $data = FamilyMember::findMoreByKey('resume_id', $id, ['call', 'name',
            'broth_at', 'company', 'job'], true);
        return response()->json(ApiException::success(ApiException::SUCCESS, $data ? $data : []));
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 获取指定属地的学校名称
     */
    public function acquireSchoolName(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateId($request, 'locationId', 'locationId');
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $locationId = $request->get('locationId');
        $cacheKey = 'location:' . $locationId;
        $schoolData = Cache::get($cacheKey);
        if (!$schoolData) {
            $schoolData = SchoolName::findMoreByKey('location_id', $locationId, ['*'], true);
            if (!$schoolData) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }
            //存入缓存中
            Cache::put($cacheKey, $schoolData, 3 * 60);
            return response()->json(ApiException::success(ApiException::SUCCESS, $schoolData));
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $schoolData));
    }



}