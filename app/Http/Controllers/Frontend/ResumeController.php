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
use App\Models\Certificate;
use App\Models\Credit;
use App\Models\Education;
use App\Models\EducationType;
use App\Models\ForeignLanguage;
use App\Models\HDegree;
use App\Models\HEducation;
use App\Models\LanguageType;
use App\Models\SchoolLocation;
use App\Models\SchoolName;
use App\Models\SchoolResume;
use App\Models\TrainType;
use App\Models\User;
use App\Models\UserInfo;
use App\Validations\ResumeValidation;
use DeepCopy\f002\A;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $this->_acquireEducationInfo($data);
        return response()->json(ApiException::success(ApiException::SUCCESS, $data));
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
        $this->_acquireEducationInfo($data);
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
        $creditId = (SchoolResume::findFirstByKey('user_id', session('userId'), ['id']))->credit_id;
        $credit = Credit::findFirstById($creditId, ['*'], true);

        return response()->json(ApiException::success(ApiException::SUCCESS, $credit ? $credit : []));
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


    private function _acquireEducationInfo(&$data)
    {
        //获取学历数据
        $educationData = HEducation::findAll(['*'], true);
        if (!$educationData) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $data['edu'] = $educationData;
        //获取学位数据
        $degreeData = HDegree::findAll(['*'], true);
        if (!$degreeData) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $data['degree'] = $degreeData;
        //获取学校属地
        $locationData = SchoolLocation::findAll(['*'], true);
        if (!$locationData) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $data['location'] = $locationData;

        //获取培养方式信息
        $trainData = TrainType::findAll(['*'], true);
        if (!$trainData) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $data['train'] = $trainData;
        //获取教育类型
        $eduType = EducationType::findAll(['*'], true);
        if (!$eduType) {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
        $data['eduType'] = $eduType;
    }





}